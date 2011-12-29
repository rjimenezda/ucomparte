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
			</form>            
         </div>        
    </div>
    
	<?php 
      	include("user_files.php");
      ?>



<!-- end .content --></div>
