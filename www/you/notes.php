<script>
$(function() {
	function log( message ) {
		$( "<div/>" ).text( message ).prependTo( "#log" );
		$( "#log" ).scrollTop( 0 );
	}

	$( "#city" ).autocomplete({
		source: function( request, response ) {
			$.ajax({
				//url: "http://ws.geonames.org/searchJSON",
				url: "../api/searchsubjets.php",
				dataType: "jsonp",
				data: {
//					featureClass: "P",
//					style: "full",
//					maxRows: 12,
//					name_startsWith: request.term
					patron_busqueda: request.term
				},
				success: function( data ) {
					response( $.map( data.nombre, function( item ) {
						return {
							//label: item.name + (item.adminName1 ? ", " + item.adminName1 : "") + ", " + item.countryName,
							//value: item.name
							label: item.nombre,
							label: item.nombre
						}
					}));
				}
			});
		},
		minLength: 2,
		select: function( event, ui ) {
			log( ui.item ?
				"Selected: " + ui.item.label :
				"Nothing selected, input was " + this.value);
		},
		open: function() {
			$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
		},
		close: function() {
			$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
		}
	});
});
</script>

<div class="content">

	<div style="float:left; width:600px;margin-top:10px;border-bottom:1px solid #999; padding-bottom:10px;">
    	<div style=" float:left; margin-left:15px; width:585px;">
			<font style="font-size:18px;">Tus archivos</font>
        </div>
        
        <div class="search" style="margin-top:10px;">
            <!--<form id="searchForm" method="get" action="" target="_self">		
                <input id="publication_text" type="text" maxlength="2048" label="Escribe un comentario..." placeholder="Escribe un comentario..." size="46">
                <input type="submit" name="submit" id="submit" class="button-primary" value="Publicar" tabindex="100">
            </form>-->
            <form enctype="multipart/form-data" method="post" action="../api/addresource.php">
			  <p>
				<!--Campo oculto para limitar el tamanyo -->
			  Elige imagen: 
				<input name="userfile" type="file">
			  </p>
			  <p>Nombre: 
				<label>
				<input type="text" name="nombre" id="nombre">
				</label>
			  </p>
			  <p>Descripcion: 
				<label>
				<input type="text" name="descripcion" id="descripcion">
				</label>
			  </p>
			  <p>
				<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
				<!-- tamaño en bytes 1kB=1024 1MB=1.048.576 -->
				<input name="Enviado" type="hidden" id="Enviado" value="1">
				<input type="submit" value="Subir" name="button">
			  </p>
			<meta charset="utf-8">	
				<style>
				.ui-autocomplete-loading { background: white url('images/ui-anim_basic_16x16.gif') right center no-repeat; }
				#city { width: 25em; }
				</style>


			<div class="demo">

			<div class="ui-widget">
				<label for="city">Etiquete el recurso en asignaturas: </label>
				<input id="city" />
			</div>

			<div class="ui-widget" style="margin-top:2em; font-family:Arial">
				Result:
				<div id="log" style="height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>
			</div>

			</div><!-- End demo -->



			<div class="demo-description">
			<p>The Autocomplete widgets provides suggestions while you type into the field. Here the suggestions are cities, displayed when at least two characters are entered into the field.</p>
			<p>In this case, the datasource is the <a href="http://geonames.org">geonames.org webservice</a>. While only the city name itself ends up in the input after selecting an element, more info is displayed in the suggestions to help find the right entry. That data is also available in callbacks, as illustrated by the Result area below the input.</p>
			</div><!-- End demo-description -->
			</form>            
         </div>        
    </div>
    
	<?php 
      	include("user_files.php");
      ?>



<!-- end .content --></div>
