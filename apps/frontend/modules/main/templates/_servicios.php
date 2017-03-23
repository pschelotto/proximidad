
<?php
	$api_key = sfConfig::get('app_apikey');

	foreach($servicios as $servicio)
	{
		echo "<a href='".url_for('servicio', $servicio)."'>";
		echo "	<div class='servicio'>";
		if($servicio->getImagen())
			echo "		<img src='/uploads/servicios/{$servicio->getImagen()}'/>";

		$tienda = $servicio->getTienda();
		$addr = urlencode(implode(',',array($tienda->getDireccion(),$tienda->getCodpos(),$tienda->getPoblacion())));
		echo "		<a class='vermapa' data-href='https://maps.google.com/maps/api/staticmap?center={$addr}&zoom=16&size=765x388&maptype=roadmap&markers=color:red|label:A|{$addr}&key={$api_key}'>ver mapa</a>";
		echo "		<div class='content'>";
		echo "			<h2>{$servicio->getTitulo()}</h2>";
		echo "			<div>{$servicio->getDescripcion()}</div>";
		echo "			<div class='precios'>";
		echo "				<div class='precio_old'>{$servicio->getPrecioOldFmt()}</div>";
		echo "				<div class='precio'>{$servicio->getPrecioFmt()}</div>";
		echo "			</div>";
		echo "		</div>";
		echo "	</div>";
		echo "</a>";
	}
