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
    
    <div class="publication">
    
    	<!--Archivos publicados-->
    	<div style=" float:left; margin-left:15px; width:585px; margin-top:5px;">
        	<img src="images/tl5_bg-title-regular-pages.png" /><font style="font-size:18px;">&nbsp;&nbsp;Archivos publicados</font>
        </div>
        
        <div style="float:left; width:585px; margin-top:15px; margin-left:15px;">
            <div style="float:left; ">
            <a href="#"><img src="images/winrar.png" width="23px" height="23px" /></a>
            </div>
            <div style="float:left; margin-left:8px;padding-top:1px;">
                <a href="#"><font style="color:#999">Apuntes de Proyectos - Proyectos (Ing. Informática) - 07/12/2011</font></a>
            </div>
        </div>
        <div style="float:left; width:585px; margin-top:15px; margin-left:15px;">
            <div style="float:left; ">
            <a href="#"><img src="images/pdf.png" width="23px" height="23px" /></a>
            </div>
            <div style="float:left; margin-left:8px;padding-top:1px;">
                <a href="#"><font style="color:#999">Práctica 2 de Bioinformática - Bioinformática (Ing. Informática)  - 02/12/2011</font></a>
            </div>
        </div>
        <div style="float:left; width:585px; margin-top:15px; margin-left:15px;">
            <div style="float:left; ">
            <a href="#"><img src="images/word.png" width="23px" height="23px" /></a>
            </div>
            <div style="float:left; margin-left:8px;padding-top:1px;">
                <a href="#"><font style="color:#999">Práctica de CORBA - SOD (Ing. Informática)  - 16/10/2011</font></a>
            </div>
        </div>
        
        <!--Archivos que te has apuntado-->
		<div style=" float:left; margin-left:15px; width:585px; margin-top:25px;">
        	<img src="images/tl5_bg-title-regular-pages.png" /><font style="font-size:18px;">&nbsp;&nbsp;Archivos que te has apuntado&nbsp;&nbsp;&nbsp;</font><img src="images/me_lo_apunto.png" width="44px" height="23px" />
        </div>
        
        <div style="float:left; width:585px; margin-top:15px; margin-left:15px;">
            <div style="float:left; ">
            <a href="#"><img src="images/winrar.png" width="23px" height="23px" /></a>
            </div>
            <div style="float:left; margin-left:8px;padding-top:1px;">
                <a href="#"><font style="color:#999">Apuntes de Proyectos - Proyectos (Ing. Informática) - 07/12/2011</font><br /></a>
                <a href="#"><font style="color:#900">Carlos Gargía García</font></a>
            </div>
        </div>
        <div style="float:left; width:585px; margin-top:15px; margin-left:15px;">
            <div style="float:left; ">
            <a href="#"><img src="images/pdf.png" width="23px" height="23px" /></a>
            </div>
            <div style="float:left; margin-left:8px;padding-top:1px;">
                <a href="#"><font style="color:#999">Práctica 2 de Bioinformática - Bioinformática (Ing. Informática)  - 02/12/2011</font><br /></a>
                <a href="#"><font style="color:#900">Miguel Ángel Cid</font></a>
            </div>
        </div>
        <div style="float:left; width:585px; margin-top:15px; margin-left:15px;">
            <div style="float:left; ">
            <a href="#"><img src="images/word.png" width="23px" height="23px" /></a>
            </div>
            <div style="float:left; margin-left:8px;padding-top:1px;">
                <a href="#"><font style="color:#999">Práctica de CORBA - SOD (Ing. Informática)  - 16/10/2011</font><br /></a>
                <a href="#"><font style="color:#900">Rafael Bernal</font></a>
            </div>
        </div>                       
        
    
    
    </div>




<!-- end .content --></div>
