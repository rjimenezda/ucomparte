<?php
//Comprobar permisos del usuario
include("../checkauth.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/favicon.ico"/>
<title>UCOmparte</title>
<link rel=stylesheet type=text/css href="styles.css">
<link rel="stylesheet" href="../css/smoothness/jquery-ui-1.8.16.custom.css" type="text/css" media="all">
<script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.16.min.js"></script>
<script language="javascript" type="text/javascript">

//Progressbar de me-apago
$(function() {
	$( "#prgs_meapago" ).progressbar({
		value: 50
	});

	$.post("../api/getuserinfo.php", { usuario_id : <?php echo $_SESSION['usuario_id']; ?> }, function(data) { $("#nombrePerfil").text( data.Nombre )}, "json" );	
	
});

function show_new_group(){
	document.getElementById('new_group').style.visibility="visible";
}

function cancel_new_group(){
	document.getElementById('new_group').style.visibility="hidden";
}
</script>
</head>

<body>
<div class="new_group" id="new_group" style="height:194px">
	<div style="float:left; width:100%; height:100%">
    	
        <form id="groupForm" class="new_groupform" method="post" action="" target="_self">
        	<div style="float:left; width:100%">
            <font style="font-size:18px;">Nuevo grupo</font><br /><br />
            <input id="group_name" class="masthead-search" autocomplete="off" type="text" maxlength="50" label="Nombre del grupo" placeholder="Nombre del grupo" size="40" />
            </div>
            <div style="float:left; width:100%; margin-top:15px;">
            <textarea id="group_description" class="masthead-search" cols="40" style="height:90px; font: 100%/1.4 Helvetica, sans-serif; font-size:13px;" label="Descripción" placeholder="Descripción"></textarea>
            </div>
            <div style="float:left; width:100%; margin-top:15px;">
            	<div style="float:left">
                	<a href="JavaScript:cancel_new_group();"><input type="button" name="cancel" id="cancel" class="button-primary" value="Cancelar" tabindex="100"></a>
                </div>
                
                <div style="float:right">
            		<input type="submit" name="submit" id="submit" class="button-primary" value="Crear" tabindex="100">
            	</div>
            </div>
        </form>
    </div>
</div>
<div class="container">
	<div class="header">
  		<div class="header_content">
        	<div class="header_left">
  				<a href="index.php"><img src="images/logo.png" alt="UCOmparte" style="display:block;" /></a>
            </div>
            <div class="header_center">
            	<div class="menu_icons">
                	<a href="index.php?content=group_blackboard" title="Home"><img src="images/home.png" alt="Home" width="50" height="50"/></a>
                    <a href="index.php?content=profile" title="Perfil"><img src="images/profile.png" alt="Perfil" width="50" height="50"/></a>
                    <a href="index.php?content=notes" title="Apuntes"><img src="images/notes.png" alt="Apuntes" width="50" height="50"/></a>
                </div>
            	<div class="search">
                	<form id="searchForm" method="post" action="" target="_self">		
                    
                    	<input id="searchBox" class="masthead-search" autocomplete="off" type="text" maxlength="2048" label="Buscar en UCOmparte" placeholder="Buscar en UCOmparte" size="50" />
                        <button class="yt-uix-button" onclick="" type="submit" id="search-btn" dir="ltr" tabindex="2" role="button"><span class="yt-uix-button-content">Buscar </span></button>
                    </form>
                  
            	</div>
            </div>
            <div class="header_right">
            	<div style="float:left; padding-left:20px">
            		<a href="#"><font style="color:#999;">Me apago</font></a>
                </div>
                <div style="float:left;">
                &nbsp;&nbsp;<a href="#"><img src="images/user_logout.png" alt="Apagarse" /></a>
                </div>
            </div>
  		</div> 
    <!-- end .header --></div>
	<div class="center">
  <div class="sidebar1">
  	<div class="user_photo">
    	<div style="float:left;">
        	<a href="#"><img src="images/photo.jpg" width="50px" height="50px" /></a>
        </div>
        <div id="nombrePerfil" class="user_name">
        </div>
    </div>
    <div class="user_group">
    	<div style="float:left; width:100%">
        	<font style="font-weight:bold;">Tus grupos</font>
  	    	<hr color="#999999" size="1px" />
            
            <!-- Se cargan los grupos a los que pertenece el usuario-->
            <div style="float: left; width:100%">
                <div style="float:left;">
                    <a href="#"><img src="images/icon_group.png" width="20" height="20" /></a>
                </div>
                <div style="float:left; margin-left:3px; padding-top:2px;">
                    <a href="#"><font style="color:#999; margin-top:2px">Primera Fila</font><br /></a>
                </div>
            </div>
            <div style="float: left; width:100%">
                <div style="float:left">
                    <a href="#"><img src="images/icon_group.png" width="20" height="20" /></a>
                </div>
                <div style="float:left; margin-left:3px; padding-top:2px;">
                    <a href="#"><font style="color:#999; margin-top:2px">2º I.Informática</font><br /></a>
                </div> 
            </div>           
        </div>
        
        <!-- Crear nuevo grupo -->
        <div style="float: left; margin-top:10px; width:100%">
        	<div style="float:left">
        		<a href="JavaScript:show_new_group();"><img src="images/new_group.png" alt="Crear un grupo" width="20" height="20" /></a>
            </div>
            <div style="float:left; margin-left:3px; padding-top:2px;">
            	<a href="JavaScript:show_new_group();"><font style="color:#999; margin-top:2px">Crear un grupo</font><br /></a>
            </div>
        </div>
    </div>
    <!--<ul class="nav">
      <li><a href="#">Vínculo uno</a></li>
      <li><a href="#">Vínculo dos</a></li>
      <li><a href="#">Vínculo tres</a></li>
      <li><a href="#">Vínculo cuatro</a></li>
    </ul>-->
    
    <!-- end .sidebar1 --></div>
    <?php
    if(!$_GET['content'])
        require("group_blackboard.php");
    else{
        if(file_exists($_GET['content'].".php"))
            require($_GET['content'].".php");
        else
            echo "Contenido no disponible";
    }
  ?>
  <div class="sidebar2">
  	<div style="margin-left:15px;">
    	<font style="font-weight:bold;">En tus grupos</font>
  	    <hr color="#999999" size="1px" />
        <a href="#"><img src="images/photo.jpg" width="23px" height="23px" /></a>
        <a href="#"><img src="images/photo.jpg" width="23px" height="23px" /></a>
        <a href="#"><img src="images/photo.jpg" width="23px" height="23px" /></a>
        <a href="#"><img src="images/photo.jpg" width="23px" height="23px" /></a>
        <a href="#"><img src="images/photo.jpg" width="23px" height="23px" /></a>
        <a href="#"><img src="images/photo.jpg" width="23px" height="23px" /></a>
	</div>
    <!-- end .sidebar2 --></div>
    </div>
  <div class="footer">
  	<div style="margin: 0 auto; width:600px; text-align:center;">
    	<font style="color:#999;">©2011 UCOmparte</font>
    </div>
    <!-- end .footer --></div>
  <!-- end .container --></div>
  
  <div class="meapago">
	<p>Haz lo que tengas que hacer, que me apago</p> 
	<div id="prgs_meapago"></div>
  </div>
  
</body>


</html>
