var oldLocation;

$(document).ready(function(){

	var location_info = $.cookie("location_info");
	if(location_info)
		$("#dnn_ctlSearchForm_ctlPlaceSearch_txtPlaceSearch").attr('placeholder',location_info).val('');
	else
		$("#dnn_ctlSearchForm_ctlPlaceSearch_txtPlaceSearch").attr('placeholder','Dirección, CP, Ciudad o Centro').val('');

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

	var timeoutId = null;
	var ajaxReq = null;
	$('.bcmContentSearchHeader').on('keyup change','#dnn_ctlSearchForm_ctlPlaceSearch_txtPlaceSearch',function(){
	
		if(timeoutId)
			clearTimeout(timeoutId);
		if(ajaxReq)
			ajaxReq.abort()
		timeoutId = setTimeout(function(){

			var address = $("#dnn_ctlSearchForm_ctlPlaceSearch_txtPlaceSearch").val().trim();
			$.cookie("location_info",address);

			if(!address)
			{
				address = $("#dnn_ctlSearchForm_ctlPlaceSearch_txtPlaceSearch").attr('placeholder');
				if(address=='Mi ubicación actual')
					return GeoLocalizeMe();
			}

			if(address)
			{
				ajaxReq = $.ajax({url:'https://maps.googleapis.com/maps/api/geocode/json?address='+address,success:function(data){

					var locat = data.results[0].geometry.location;
					var position = {
						coords:{
							latitude: locat.lat, 
							longitude: locat.lng
						}, 
						search:$('#searchText').val()
					};
					$.ajax({url:base_path+'/main',type:'post', data:position, cache:false, success:function(data){
						$('#servicios').html(data);
					}});

				}});
			}
			else
			{
				$.ajax({url:base_path+'/main',type:'post', data:{search:$('#searchText').val()}, cache:false, success:function(data){
					$('#servicios').html(data);
				}});
			}

		},200);
	});


	$('#dnn_ctlSearchForm_ctlPlaceSearch_txtPlaceSearch').click(function(){
		$('.dvRecentLocation').show();
	}).keydown(function(){
		$('.dvRecentLocation').hide();
	});

	$('body').click(function(ev){
		if(!$(ev.target).parents('.contentAncherClearInputSearch').length)
			$('.dvRecentLocation').hide();
	});

	$('.dvRecentLocation li').click(function(ev){
		$('.dvRecentLocation').hide();

		var position = {bounds:{},search:$('#searchText').val()};
		eval("position.bounds = "+$(this).attr('bounds')+";");
		$.ajax({url:base_path+'/main',type:'post', data:position, cache:false, success:function(data){
			$('#servicios').html(data);
		}});

		$.cookie("location_info",$(this).attr('address'));

		$("#dnn_ctlSearchForm_ctlPlaceSearch_txtPlaceSearch")
			.attr('placeholder',$(this).attr('address'))
			.val('')
			.attr('title',$(this).attr('address'));
	});

	$('#searchForm').submit(function(){

		var search_data = {
			search: $('#searchText').val()
		};

		$.ajax({url:base_path+'/main',type:'post', data:search_data, cache:false, success:function(data){
			$('#servicios').html(data);
		}});
		
		return false;
	});
});

function GeoLocalizeMe()
{
	if (navigator.geolocation)
	{
		navigator.geolocation.getCurrentPosition(function(position){
			updatePosition(position);
		});
	}
	else
		$("#dnn_ctlSearchForm_ctlPlaceSearch_txtPlaceSearch").val("La geolocalización no está soportada en este navegador.");
}

function updatePosition(position)
{
	$('#latitud').val(position.coords.latitude);
	$('#longitud').val(position.coords.longitude);

	position.search = $('#searchText').val();

	$.ajax({url:base_path+'/main',type:'post', data:position, success:function(data){
		$('#servicios').html(data);
	}});
	$.ajax({url:'https://maps.googleapis.com/maps/api/geocode/json?latlng='+position.coords.latitude+','+position.coords.longitude,success:function(data){

//		var address = data.results[1].address_components[0].short_name+', '+data.results[1].address_components[1].short_name;
		$.cookie("location_info","Mi ubicación actual");

		var address = data.results[1].formatted_address;
		$("#dnn_ctlSearchForm_ctlPlaceSearch_txtPlaceSearch")
			.attr('placeholder',"Mi ubicación actual")
			.val('')
			.attr('title',address);
	}});
}