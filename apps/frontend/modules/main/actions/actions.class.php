<?php

class mainActions extends sfActions
{
	public function executeIndex(sfRequest $request)
	{
		if($request->getMethod()=='POST')
		{
			$search = $request->getParameter('search');

			$servicios = array();
			if($coords = $request->getParameter('coords'))
			{
				$this->getUser()->setAttribute('coords',$coords);
				$this->getUser()->setAttribute('bounds',null);
				$servicios = $this->getServiciosProximos($coords, $search);
			}
			else
			if($bounds = $request->getParameter('bounds'))
			{
				$this->getUser()->setAttribute('bounds',$bounds);
				$this->getUser()->setAttribute('coords',null);
				$servicios = $this->getServiciosDentroDe($bounds, $search);
			}
			else
			{
				if($coords = $this->getUser()->getAttribute('coords'))
					$servicios = $this->getServiciosProximos($coords, $search);

				if($bounds = $this->getUser()->getAttribute('bounds'))
					$servicios = $this->getServiciosDentroDe($bounds, $search);

//				if(!count($servicios))
//					$servicios = Doctrine::getTable('Servicio')->findAll();
			}
			
			sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
			$html = get_partial("main/servicios", array(
				'servicios' 		=> $servicios,
			));

			return $this->renderText($html);
		}
		else
		{
			if($coords = $this->getUser()->getAttribute('coords'))
				$this->servicios = $this->getServiciosProximos($coords);

			if($bounds = $this->getUser()->getAttribute('bounds'))
				$this->servicios = $this->getServiciosDentroDe($bounds);

			if(!$this->servicios && !($bounds || $coords))
				$this->servicios = Doctrine::getTable('Servicio')->findAll();
		}
	}
	
	function getServiciosProximos($coords, $search=null)
	{
		$lat = $coords['latitude']; // latitude of centre of bounding circle in degrees
		$lon = $coords['longitude']; // longitude of centre of bounding circle in degrees
		$rad = 4; // radius of bounding circle in kilometers

		$R = 6371;  // earth's mean radius, km

		// first-cut bounding box (in degrees)
		$maxLat = $lat + rad2deg($rad/$R);
		$minLat = $lat - rad2deg($rad/$R);
		$maxLon = $lon + rad2deg(asin($rad/$R) / cos(deg2rad($lat)));
		$minLon = $lon - rad2deg(asin($rad/$R) / cos(deg2rad($lat)));

		$sql = "Select *,
					   acos(sin(:lat)*sin(radians(latitud)) + cos(:lat)*cos(radians(latitud))*cos(radians(longitud)-:lon)) * :R As D
				From (
					Select *
					From tienda
					Where latitud Between :minLat And :maxLat
					  And longitud Between :minLon And :maxLon
				) As FirstCut
				Where acos(sin(:lat)*sin(radians(latitud)) + cos(:lat)*cos(radians(latitud))*cos(radians(longitud)-:lon)) * :R < :rad
				Order by D";


		$params = [
			'lat'    => deg2rad($lat),
			'lon'    => deg2rad($lon),
			'minLat' => $minLat,
			'minLon' => $minLon,
			'maxLat' => $maxLat,
			'maxLon' => $maxLon,
			'rad'    => $rad,
			'R'      => $R,
		];

		foreach($params as $k => $v)
			$sql = str_replace(":{$k}", $v, $sql);


		$q = Doctrine_Manager::getInstance()->getCurrentConnection();
		$pdo = $q->execute($sql);
		$pdo->setFetchMode(Doctrine_Core::FETCH_ASSOC);
		$tiendas = $pdo->fetchAll();

		$ids = array();
		foreach($tiendas as $tienda)
			$ids[] = $tienda['id'];

		$servicios = array();
		if(count($ids))
		{
			$q = Doctrine::getTable('Servicio')->createQuery('s')
				->leftJoin('s.Tienda t')
				->whereIn('s.tienda_id', $ids);
			if($search)
				$q->andWhere("t.nombre like '%{$search}%' or s.titulo like '%{$search}%' or s.descripcion like '%{$search}%'");
			$servicios = $q->execute();
		}

		return $servicios;
	}
	
	function getServiciosDentroDe($bounds, $search=null)
	{
		$q = Doctrine::getTable('Tienda')->createQuery()
			->andWhere("(latitud Between {$bounds['southwest']['lat']} And {$bounds['northeast']['lat']}) And (longitud Between {$bounds['southwest']['lng']} And {$bounds['northeast']['lng']})");
		$tiendas = $q->execute();

		$ids = array();
		foreach($tiendas as $tienda)
			$ids[] = $tienda['id'];

		$servicios = array();
		if(count($ids))
		{
			$q = Doctrine::getTable('Servicio')->createQuery('s')
				->leftJoin('s.Tienda t')
				->whereIn('s.tienda_id', $ids);
			if($search)
				$q->andWhere("t.nombre like '%{$search}%' or s.titulo like '%{$search}%' or s.descripcion like '%{$search}%'");
			$servicios = $q->execute();
		}

		return $servicios;
	}

/*	
	function change_project_name()
	{
		$filename = '../plugins/.registry/.channel.plugins.symfony-project.org/sfdoctrineguardplugin.reg';
		$data = unserialize(file_get_contents($filename));
		foreach($data['filelist'] as $fname => $flist)
			foreach($flist as $k => $v)
				$data['filelist'][$fname][$k] = str_replace('stetik','proximidad',$v);

		$dirtree = array();
		foreach($data['dirtree'] as $k => $v)
			$dirtree[str_replace('stetik','proximidad',$k)] = $v;
		$data['dirtree'] = $dirtree;
		
		file_put_contents($filename,serialize($data));
	}
*/

/*
	public function executeTest(){
	
		$api_key = sfConfig::get('app_apikey');


		$cities = array(
			array(
				'location' => 'Madrid',
				'address' => 'Madrid, España',
				'lat' => '40.4100000000',
				'long' => '3.7000000000',
			),
			array(
				'location' => 'Barcelona',
				'address' => 'Barcelona, España',
				'lat' => '41.800000000"',
				'long' => '2.1700000000',
			),
			array(
				'location' => 'A Coruña',
				'address' => 'A Coruña, España',
				'lat' => '43.3500000000',
				'long' => '-8.4000000000',
			),
			array(
				'location' => 'Alicante',
				'address' => 'Alicante, España',
				'lat' => '38.3400000000',
				'long' => '-0.4900000000',
			),
			array(
				'location' => 'Bilbao',
				'address' => 'Bilbao, España',
				'lat' => '43.2500000000',
				'long' => '-2.9200000000',
			),
			array(
				'location' => 'Donosti',
				'address' => 'Donosti, España',
				'lat' => '43.3200000000',
				'long' => '-1.9800000000',
			),
			array(
				'location' => 'Granada',
				'address' => 'Granada, España',
				'lat' => '37.1700000000',
				'long' => '-3.5900000000',
			),
			array(
				'location' => 'Málaga',
				'address' => 'Málaga, España',
				'lat' => '36.7200000000',
				'long' => '-4.4200000000',
			),
			array(
				'location' => 'Mallorca',
				'address' => 'Mallorca, España',
				'lat' => '39.5600000000',
				'long' => '2.6500000000',
			),
			array(
				'location' => 'Oviedo',
				'address' => 'Oviedo, España',
				'lat' => '43.3600000000',
				'long' => '-5.8400000000',
			),
			array(
				'location' => 'Santander',
				'address' => 'Santander, España',
				'lat' => '43.4600000000',
				'long' => '-3.8100000000',
			),
			array(
				'location' => 'Sevilla',
				'address' => 'Sevilla, España',
				'lat' => '37.3800000000',
				'long' => '-5.9800000000',
			),
			array(
				'location' => 'Valencia',
				'address' => 'Valencia, España',
				'lat' => '39.4700000000',
				'long' => '-0.3700000000',
			),
			array(
				'location' => 'Valladolid',
				'address' => 'Valladolid, España',
				'lat' => '41.6500000000',
				'long' => '-4.7200000000',
			),
			array(
				'location' => 'Zaragoza',
				'address' => 'Zaragoza, España',
				'lat' => '41.6500000000',
				'long' => '-0.8900000000',
			),
		);

		foreach($cities as &$city)
		{
			$addr = rawurlencode($city['address']);
			$json = json_decode(file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$addr}&components=country:ES&key={$api_key}"));
			$bounds = $json->results[0]->geometry->bounds;

			unset($city['lat']);
			unset($city['long']);
			$city['bounds'] = $bounds;
		}

		echo json_encode($cities);exit;				
	}
*/
}

