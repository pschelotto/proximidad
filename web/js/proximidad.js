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

	$('.servicio').on('click','.vermapa',function(){
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
//			console.log(data.results);
//				$("#dnn_ctlSearchForm_ctlPlaceSearch_txtPlaceSearch").val(data.results[0].formatted_address);
				$("#dnn_ctlSearchForm_ctlPlaceSearch_txtPlaceSearch").val(data.results[1].address_components[0].short_name+', '+data.results[1].address_components[1].short_name);
			}});
		});
	}
	else
		$("#dnn_ctlSearchForm_ctlPlaceSearch_txtPlaceSearch").val("La geolocalización no está soportada en este navegador.");
}