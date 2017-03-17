
<script src="https://code.jquery.com/jquery-1.4.1.min.js"></script>
<script>

	if (navigator.geolocation)
	{
		navigator.geolocation.getCurrentPosition(function(position){
//			$("#geoloc").html("Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude);
			$.ajax({url:'https://maps.googleapis.com/maps/api/geocode/json?latlng='+position.coords.latitude+','+position.coords.longitude,success:function(data){
				console.log(data);
//				for(it in data.results)
					$("#geoloc").append("<p>"+data.results[0].formatted_address+"</p>");
			}});
		});
	}
	else
		$("#geoloc").html("La geolocalización no está soportada en este navegador.");

</script>

<body>
	<p id="geoloc"></p>
</body>

<?php

	foreach($servicios as $servicio)
	{
		echo "<div class='servicio'>";
		if($servicio->getImagen())
			echo "<img src='/uploads/servicios/{$servicio->getImagen()}'>";
		echo "<div class='content'>";
		echo "<h2>{$servicio->getTitulo()}</h2>";
		echo "<div>{$servicio->getDescripcion()}</div>";
		echo "</div>";
		echo "</div>";
	}