
<script src="https://code.jquery.com/jquery-1.4.1.min.js"></script>
<script>

	function GeoLocalizeMe()
	{
		if (navigator.geolocation)
		{
			navigator.geolocation.getCurrentPosition(function(position){
	//			$("#geoloc").html("Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude);
				$.ajax({url:'https://maps.googleapis.com/maps/api/geocode/json?latlng='+position.coords.latitude+','+position.coords.longitude,success:function(data){
					$("#dnn_ctlSearchForm_ctlPlaceSearch_txtPlaceSearch").val(data.results[0].formatted_address);
				}});
			});
		}
		else
			$("#dnn_ctlSearchForm_ctlPlaceSearch_txtPlaceSearch").val("La geolocalización no está soportada en este navegador.");
	}
</script>

<body>
	
	<?php
		include_partial('buscador');
//	https://maps.google.com/maps/api/staticmap?center=Preciados,11,28013,Madrid,Madrid&zoom=16&size=765x388&maptype=roadmap&markers=color:red|label:A|Preciados,11,28013,Madrid,Madrid&sensor=false

	 ?>

</body>

<?php

	foreach($servicios as $servicio)
	{
		echo "<a href='/{$servicio->getSlug()}'>";
		echo "<div class='servicio'>";
		if($servicio->getImagen())
			echo "<img src='/uploads/servicios/{$servicio->getImagen()}'>";

		$tienda = $servicio->getTienda();
		$addr = urlencode(implode(',',array($tienda->getDireccion(),$tienda->getCodpos(),$tienda->getPoblacion())));
		echo "<a href='https://maps.google.com/maps/api/staticmap?center={$addr}&zoom=16&size=765x388&maptype=roadmap&markers=color:red|label:A|{$addr}&key=AIzaSyDGDRQoqRIutG1IbxEOf9nLfF3pFoUj1qA'>ver mapa</a>";
		echo "<div class='content'>";
		echo "<h2>{$servicio->getTitulo()}</h2>";
		echo "<div>{$servicio->getDescripcion()}</div>";
		echo "</div>";
		echo "</div>";
		echo "</a>";
	}