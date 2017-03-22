<?php

class mainActions extends sfActions
{
	public function executeIndex(sfRequest $request)
	{
		if($request->getMethod()=='POST')
		{
			$coords = $request->getParameter('coords');

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
			$result = $pdo->fetchAll();

			$ids = array();
			foreach($result as $tienda)
				$ids[] = $tienda['id'];

			$this->servicios = array();
			if(count($ids))
			{
				$q = Doctrine::getTable('Servicio')->createQuery()
					->whereIn('tienda_id', $ids);
				$this->servicios = $q->execute();
			}

			sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
			$html = get_partial("main/servicios", array(
				'servicios' 		=> $this->servicios,
			));
					
			 return $this->renderText($html);
		}
		else
			$this->servicios = Doctrine::getTable('Servicio')->findAll();
	}
}

