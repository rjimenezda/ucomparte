<script>

selected_subjects = []
subject_widget = '<span id="span_%ID%">%SUBNAME%<input type="button" id="sub_button_%ID%" value="X"></span><br />'

$(function() {
	function log( message ) {
		$( "<div/>" ).text( message ).prependTo( "#log" );
		$( "#log" ).scrollTop( 0 );
		$("#city").val("LOLOLO");
		
	}

	$( "#city" ).autocomplete({
		source: function( request, response ) {
			$.ajax({
				url: "../api/searchsubjets.php",
				dataType: "json",
				data: {
					patron_busqueda: request.term,
				},
				success: function( data ) {
					if (data != null) {
					response( $.map( data, function( item ) {
						return {
							label: item.nombre + " (" + item.titulacion + ")",
							asignatura_nombre : item.nombre,
							titulacion_nombre : item.titulacion,
							asignatura_id : item.asignatura_id
						}
					}));
					}
				}
			});
		},
		minLength: 2,
		select: function( event, ui ) {
			if (ui.item) {
				selected_subjects.push(ui.item.asignatura_id);
				content = subject_widget.replace("%ID%", ui.item.asignatura_id)
				content = content.replace("%SUBNAME%", ui.item.label)
				content = content.replace("%ID%", ui.item.asignatura_id)
				$("#selectedSub").append(content)
				$("#sub_button_"+ui.item.asignatura_id).click(function() {
													 for (i = 0; i < selected_subjects.length; i++) {
														 if (selected_subjects[i] == ui.item.asignatura_id)
															 selected_subjects.splice(i)
														 }
													 $("#span_"+ui.item.asignatura_id).remove()
													 })
				}
/*			log( ui.item ?
				"Selected: " + ui.item.label + "(id => " + ui.item.asignatura_id + " )":
				"Nothing selected, input was " + this.value); */
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

			<!-- <div class="ui-widget" style="margin-top:2em; font-family:Arial">
				Result:
				<div id="log" style="height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>
			</div> -->
			
			<div id="selectedSub">
			
			</div>

			</div><!-- End demo -->
			</form>            
         </div>        
    </div>
    
	<?php 
      	include("user_files.php");
      ?>



<!-- end .content --></div>
