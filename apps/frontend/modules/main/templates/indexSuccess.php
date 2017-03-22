<!--
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
-->

  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  

<script>
	$(document).ready(function(){
	
		var dialog1 = $("#dialog").dialog({ 
			autoOpen: false,
			height: 400,
			width: 600,
			dialogClass: 'noTitleStuff',
			modal: true,
			open: function(){
				$('.ui-widget-overlay').bind('click',function(){
					$('#dialog').dialog('close');
				})
			}
		});
	
		$('#servicios').on('click','.vermapa',function(){
			dialog1.css({'background-image':'url('+$(this).attr('data-href')+')'}).dialog('open');
		});
	});

	function GeoLocalizeMe()
	{
		if (navigator.geolocation)
		{
			navigator.geolocation.getCurrentPosition(function(position){
				$('#latitud').val(position.coords.latitude);
				$('#longitud').val(position.coords.longitude);
				$.ajax({url:'/main',type:'post', data:position, success:function(data){
					$('#servicios').html(data);
				}});
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

	<div id="servicios">
		<?php include_partial('servicios',array('servicios' => $servicios)); ?>
	</div>

	<div id='dialog'></div>
	
</body>