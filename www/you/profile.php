<script type="text/javascript">
function fileicon(filetype) {
 	if (filetype=="jpg" || filetype=="jpeg" || filetype=="png" || filetype=="gif")
		return "image";
	else if (filetype=="pdf")
		return "pdf";
	else if (filetype=="zip" || filetype=="rar" || filetype=="gz" || filetype=="tar" || filetype=="gz" || filetype=="rar")
		return "compress";
	else 
		return "default";
}

function filluserresources(data) {
	$("#sharedResources").empty();
	$.each(data, function(i, recurso){
		$("#sharedResources").append("<img src='images/fileicons/"+fileicon(recurso.formato)+".png' width='20' height='20' style='float:left;' />").append($("<a style='color:#999;'>").attr("href", recurso.URL).text(recurso.nombre)).append("<br style='clear:both;' />");
	})
}

function fillusergroups(data){
		$("#group_list_placeholder").empty();
		$.each(data, function(i, grupo){
			$("#group_list_placeholder").append("<img src='images/icon_group.png' width='20' height='20' style='float:left;' />").append($("<a style='color:#999;'>").attr("href", "index.php?content=group_blackboard&id="+grupo.grupo_id).text(grupo.nombre)).append("<br style='clear:both;' />");
		})
	}

$(function(){
	//Se hace la consulta para extraer el nombre completo
	$.post("../api/getuserinfo.php", { usuario_id : <?php echo $_GET['uid']; ?> }, function(){}, "json" ).success(function(data) { $("#nombreCompleto").text( data.nombre + " " +  data.apellidos );})
	$.post("../api/getusergrouplist.php", { usuario_id : <?php echo $_GET['uid']; ?> }, function(){}, "json" ).success(fillusergroups);

	$.post("../api/getuserresources.php", { usuario_id : <?php echo $_SESSION['usuario_id']; ?> }, function(){}, "json" ).success(filluserresources);

	
})
</script>

<div class="content">
	<div style="float:left; width:600px;margin-top:10px;border-bottom:1px solid #999; padding-bottom:10px;">
    	<div style=" float:left; margin-left:15px; width:200px;">
    		<img src="users_images/<?php if (!file_exists("users_images/" . $_GET['uid'] . ".jpg")) {
        			echo "default_male.jpg";
        		} else {
        			echo $_GET['uid'] . ".jpg";
        		}?>" width="200px" height="200px" />
        </div>
    	<div style=" float:left; margin-left:15px; width:370px;">
        	<div style="float: left; width:100%; margin-bottom:15px;">
                <font id="nombreCompleto" style="font-size:24px;"></font><br />
                <font style=" font-size:18px;">Grupos a los que pertenece:</font>
        	</div>
        
            <!-- Se cargan los grupos a los que pertenece el usuario-->
			<div id="group_list_placeholder">
				<font style="color:#999; margin-top:2px">Cargando...</font><br />
			</div>
			       
    	</div>    
      
    </div>
    <div class="publication">
    
    	<!--Archivos publicados-->
    	<div style=" float:left; margin-left:15px; width:585px; margin-top:5px;">
        	<div style="float:left; margin-top:4px;">
        		<img src="images/tl5_bg-title-regular-pages.png" />
            </div>
            <div style="float:left">
            	<font style="font-size:18px;">&nbsp;&nbsp;Archivos publicados&nbsp;&nbsp;&nbsp;</font>
            </div>
            <div style="float:left">
            	<img src="images/mis_apuntes.png" width="23px" height="23px" />
            </div>
        </div>
        
        <div id="sharedResources" style="float:left; width:585px; margin-top:15px; margin-left:15px;">
           
        </div>
        
        <!--Archivos que se ha apuntado-->
		<div style=" float:left; margin-left:15px; width:585px; margin-top:25px;">
        	<div style="float:left; margin-top:4px;">
        		<img src="images/tl5_bg-title-regular-pages.png" />
            </div>
            <div style="float:left">
            	<font style="font-size:18px;">&nbsp;&nbsp;Archivos que te has apuntado&nbsp;&nbsp;&nbsp;</font>
            </div>
            <div style="float:left">
            	<img src="images/me_lo_apunto.png" width="44px" height="23px" />
            </div>
        </div>
        
        <div style="float:left; width:585px; margin-top:15px; margin-left:15px;">
            <div style="float:left; width: 30px; ">
            <a href="#"><img src="images/winrar.png" width="23px" height="23px" /></a>
            </div>
            <div style="float:left; width: 540px;padding-top:1px;">
                <a href="#"><font style="color:#999">Apuntes de Proyectos - Proyectos (Ing. Informática) - 07/12/2011</font><br /></a>
                <a href="#"><font style="color:#900">Carlos Gargía García</font></a>
            </div>
        </div>
        <div style="float:left; width:585px; margin-top:15px; margin-left:15px;">
            <div style="float:left; width: 30px; ">
            <a href="#"><img src="images/pdf.png" width="23px" height="23px" /></a>
            </div>
            <div style="float:left; width: 540px;padding-top:1px;">
                <a href="#"><font style="color:#999">Práctica 2 de Bioinformática - Bioinformática (Ing. Informática)  - 02/12/2011</font><br /></a>
                <a href="#"><font style="color:#900">Miguel Ángel Cid</font></a>
            </div>
        </div>
        <div style="float:left; width:585px; margin-top:15px; margin-left:15px;">
            <div style="float:left; width: 30px; ">
            <a href="#"><img src="images/word.png" width="23px" height="23px" /></a>
            </div>
            <div style="float:left; width: 540px;padding-top:1px;">
                <a href="#"><font style="color:#999">Práctica de CORBA - SOD (Ing. Informática)  - 16/10/2011</font><br /></a>
                <a href="#"><font style="color:#900">Rafael Bernal</font></a>
            </div>
        </div>                       
        
    
    
    </div>
</div>
