<?php
	$api_key = sfConfig::get('app_apikey');

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
	echo "				<div class='precio_old'>{$precio_old_fmt}</div>";
	echo "				<div class='precio'>{$precio_fmt}</div>";
	echo "			</div>";
	echo "		</div>";
	echo "	</div>";
	echo "</a>";

	echo "<div style='clear:both'></div>";
	echo "<a href='".url_for('@homepage')."'>Volver atrás</a>";