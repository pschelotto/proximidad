<script>
	var base_path = '<?php echo preg_replace('/\/$/','',url_for('@homepage'))?>';
</script>
<form method='post' id='searchForm'>
<div class="bcmContentSearchHeader">
	<div class="bcmContentCenterSearch">
        <div class="bcmCntrlSearch">
            <div class="contentAncherClearInputSearch">
                <div class="awesomplete"><input name="searchText" type="text" id="searchText" tabindex="1" placeholder="¿Qué quieres hacerte?" autocomplete="off" aria-autocomplete="list"><ul hidden=""><li aria-selected="false" class="category">Peluquería</li><li aria-selected="false" class="">Yoga</li><li aria-selected="false" class="">Marcas Peluquería</li><li aria-selected="false" class="">Color</li><li aria-selected="false" class="">Mechas</li><li aria-selected="false" class="">Tratamiento Capilar</li><li aria-selected="false" class="">Barbería</li><li aria-selected="false" class="">Peinados</li><li aria-selected="false" class="">Alisados y Permanentes</li><li aria-selected="false" class="">Cambio de Look</li><li aria-selected="false" class="">Bodas y Novias</li><li aria-selected="false" class="">Extensiones</li><li aria-selected="false" class="">Afeitado a Navaja</li><li aria-selected="false" class="">Afeitado Barba</li><li aria-selected="false" class="">Alisado Brasileño</li><li aria-selected="false" class="">Alisado Japonés</li><li aria-selected="false" class="">Alisado Keratina</li><li aria-selected="false" class="">American Crew</li><li aria-selected="false" class="">Anticaída Pelo</li><li aria-selected="false" class="">Arreglo de Barba</li><li aria-selected="false" class="">Aveda Peluquería</li><li aria-selected="false" class="">Baño de Color</li><li aria-selected="false" class="">Bótox Capilar</li><li aria-selected="false" class="">Cortar y Color</li><li aria-selected="false" class="">Cortar y Mechas</li><li aria-selected="false" class="">Cortar y Peinar</li><li aria-selected="false" class="">Cortar, Color y Peinar</li><li aria-selected="false" class="">Corte de Pelo Hombre</li><li aria-selected="false" class="">Corte de Pelo Infantil</li><li aria-selected="false" class="">Corte de Pelo Mujer</li><li aria-selected="false" class="">Corte y Afeitado</li><li aria-selected="false" class="">Davines</li><li aria-selected="false" class="">GHD</li><li aria-selected="false" class="">Goldwell</li><li aria-selected="false" class="">Hidratación Capilar</li><li aria-selected="false" class="">Icon</li><li aria-selected="false" class="">Inoa</li><li aria-selected="false" class="">Kerastase</li><li aria-selected="false" class="">Keratina</li><li aria-selected="false" class="">L´Oreal Professionnel</li><li aria-selected="false" class="">Living Proof</li><li aria-selected="false" class="">Matrix</li><li aria-selected="false" class="">Mechas Balayage</li><li aria-selected="false" class="">Mechas Californianas</li><li aria-selected="false" class="">Mechas Corte y Peinado</li><li aria-selected="false" class="">Mechas Tradicionales</li><li aria-selected="false" class="">Moldeado y Permanente</li><li aria-selected="false" class="">Moroccanoil</li><li aria-selected="false" class="">Recogidos</li><li aria-selected="false" class="">Redken</li><li aria-selected="false" class="">Revlon Professional</li><li aria-selected="false" class="">Salerm</li><li aria-selected="false" class="">Schwarzkopf</li><li aria-selected="false" class="">Sebastian Professional</li><li aria-selected="false" class="">Secretos del Agua Peluquería</li><li aria-selected="false" class="">Taninoplastia</li><li aria-selected="false" class="">Tinte</li><li aria-selected="false" class="">Wella</li><li aria-selected="false" class="category">Estética</li><li aria-selected="false" class="">Tratamientos Faciales</li><li aria-selected="false" class="">Pestañas y Cejas</li><li aria-selected="false" class="">Tratamientos Corporales</li><li aria-selected="false" class="">Marcas Estética</li><li aria-selected="false" class="">Bronceado</li><li aria-selected="false" class="">Maquillaje</li><li aria-selected="false" class="">Dental</li><li aria-selected="false" class="">Podología</li><li aria-selected="false" class="">Tatuajes</li><li aria-selected="false" class="">Piercing</li><li aria-selected="false" class="">Micropigmentación</li><li aria-selected="false" class="">Alqvimia Estética</li><li aria-selected="false" class="">Antiedad</li><li aria-selected="false" class="">Aveda Estética</li><li aria-selected="false" class="">Blanqueamiento Dental</li><li aria-selected="false" class="">Bótox Facial</li><li aria-selected="false" class="">Casmara</li><li aria-selected="false" class="">Cavitación</li><li aria-selected="false" class="">Criolipólisis</li><li aria-selected="false" class="">Drenaje Linfático Corporal</li><li aria-selected="false" class="">Drenaje Linfático Facial</li><li aria-selected="false" class="">Extensiones de Pestañas</li><li aria-selected="false" class="">Germaine de Capuccini</li><li aria-selected="false" class="">Hidratante Corporal</li><li aria-selected="false" class="">Hidratante Facial</li><li aria-selected="false" class="">Higiene Facial / Limpieza de Cutis</li><li aria-selected="false" class="">Indiba</li><li aria-selected="false" class="">Lifting Facial</li><li aria-selected="false" class="">Limpieza Dental</li><li aria-selected="false" class="">LPG</li><li aria-selected="false" class="">Mesoestetic</li><li aria-selected="false" class="">Mesoterapia Corporal</li><li aria-selected="false" class="">Mesoterapia Facial</li><li aria-selected="false" class="">Microdermoabrasión</li><li aria-selected="false" class="">Micropigmentación Cejas</li><li aria-selected="false" class="">Micropigmentación Labio</li><li aria-selected="false" class="">Micropigmentación Ojos</li><li aria-selected="false" class="">Natura Bissé</li><li aria-selected="false" class="">Peeling Corporal</li><li aria-selected="false" class="">Peeling Facial</li><li aria-selected="false" class="">Presoterapia</li></ul><span class="visually-hidden" role="status" aria-live="assertive" aria-relevant="additions"></span></div>
                <a class="clearSearchInput" id="deleteService" style="display: none;" href="javascript:deleteService()">?</a>
            </div>


		 <div class="contentAncherClearInputSearch">
			 <input name="search" type="text" id="dnn_ctlSearchForm_ctlPlaceSearch_txtPlaceSearch" tabindex="2" autocomplete="off" placeholder="">
			 <a class="clearSearchInput" id="deletePlace" style="display: none;" href="javascript:deletePlace()">?</a>
			 <div id="locationRequired" class="locationRequired" style="display:none;">Nos adaptamos a tu disponibilidad, indica tu dirección para ofrecerte los mejores resultados.</div>
			 <div class="predictionsSearch" style="display: none;">
				 <ul class="comboResults">

				 </ul>
			 </div>
			 <div class="dvRecentLocation" style="display: none;">
				<ul id="dvLastSearch"></ul>

				<ul>

					<li class="titt">
						Ciudades más populares
					</li>
					<?php 
						$cities = json_decode('[{"location":"Madrid","address":"Madrid, Espa\u00f1a","bounds":{"northeast":{"lat":40.5638447,"lng":-3.5249115},"southwest":{"lat":40.3120639,"lng":-3.8341618}}},{"location":"Barcelona","address":"Barcelona, Espa\u00f1a","bounds":{"northeast":{"lat":41.4695761,"lng":2.2280099},"southwest":{"lat":41.320004,"lng":2.0695258}}},{"location":"A Coru\u00f1a","address":"A Coru\u00f1a, Espa\u00f1a","bounds":{"northeast":{"lat":43.3864073,"lng":-8.3871082},"southwest":{"lat":43.337341,"lng":-8.4382592}}},{"location":"Alicante","address":"Alicante, Espa\u00f1a","bounds":{"northeast":{"lat":38.3909328,"lng":-0.4034191},"southwest":{"lat":38.3247488,"lng":-0.5416292}}},{"location":"Bilbao","address":"Bilbao, Espa\u00f1a","bounds":{"northeast":{"lat":43.289146,"lng":-2.8897629},"southwest":{"lat":43.237501,"lng":-2.9773659}}},{"location":"Donosti","address":"Donosti, Espa\u00f1a","bounds":{"northeast":{"lat":43.3287143,"lng":-1.9242115},"southwest":{"lat":43.285871,"lng":-2.0235544}}},{"location":"Granada","address":"Granada, Espa\u00f1a","bounds":{"northeast":{"lat":37.2124648,"lng":-3.5487084},"southwest":{"lat":37.1494277,"lng":-3.6338351}}},{"location":"M\u00e1laga","address":"M\u00e1laga, Espa\u00f1a","bounds":{"northeast":{"lat":36.8940412,"lng":-4.2604897},"southwest":{"lat":36.6356229,"lng":-4.5878886}}},{"location":"Mallorca","address":"Mallorca, Espa\u00f1a","bounds":{"northeast":{"lat":39.9625327,"lng":3.4785968},"southwest":{"lat":39.2644632,"lng":2.3447062}}},{"location":"Oviedo","address":"Oviedo, Espa\u00f1a","bounds":{"northeast":{"lat":43.3920386,"lng":-5.8121272},"southwest":{"lat":43.3469351,"lng":-5.8851884}}},{"location":"Santander","address":"Santander, Espa\u00f1a","bounds":{"northeast":{"lat":43.4863908,"lng":-3.7536109},"southwest":{"lat":43.436298,"lng":-3.8686632}}},{"location":"Sevilla","address":"Sevilla, Espa\u00f1a","bounds":{"northeast":{"lat":37.4355212,"lng":-5.8884587},"southwest":{"lat":37.3152203,"lng":-6.0216578}}},{"location":"Valencia","address":"Valencia, Espa\u00f1a","bounds":{"northeast":{"lat":39.5073225,"lng":-0.2914778},"southwest":{"lat":39.308248,"lng":-0.4315448}}},{"location":"Valladolid","address":"Valladolid, Espa\u00f1a","bounds":{"northeast":{"lat":41.8155086,"lng":-4.6894439},"southwest":{"lat":41.5909983,"lng":-4.9281803}}},{"location":"Zaragoza","address":"Zaragoza, Espa\u00f1a","bounds":{"northeast":{"lat":41.6894079,"lng":-0.8427317},"southwest":{"lat":41.6139746,"lng":-0.9472301}}}]');
						foreach($cities as $city)
						{
							$bounds = json_encode($city->bounds);
echo <<<EOF
							<li address="{$city->address}" class="" bounds='{$bounds}'>
								<span class="LocationAddress">
									{$city->location}
								</span>
							</li>
EOF;
						}
					?>
				</ul>

			 </div>
		 </div>

		<a href="javascript:GeoLocalizeMe();" style="" class="bcmSearchIcon"></a>      
		<a class="btnOrangeSearch" id="btnToday" href="javascript:setDate(1);" tabindex="3">Hoy</a>
		<a class="btnOrangeSearch" id="btnTomorrow" href="javascript:setDate(2);" tabindex="4">Mañana</a>

		<div class="contentBtnOrangeSearch"><input type="text" id="newDatePicker" readonly="" class="hasDatepicker"><button type="button" class="ui-datepicker-trigger">Otro</button></div>
			<div class="inputOnButtons">
				<input type="text" id="inputDatepiker" readonly="" class="hasDatepicker">
				<a class="clearSearchInput" id="deleteDate" style="display: none;" href="javascript:deleteDate()">?</a>
			</div>
			<input type="submit" value="Buscar" id="search">
		</div>

	</div>
</div>
</form>