<?php
//Comprobar permisos del usuario
include("../checkauth.php");

error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/favicon.ico"/>
<title>UCOmparte</title>
<link rel=stylesheet type=text/css href="styles.css" />
<link rel="stylesheet" href="../css/smoothness/jquery-ui-1.8.16.custom.css" type="text/css" media="all" />
<script type="text/javascript" src="../js/jquery-1.7.1.min.js" ></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.16.min.js"></script>
<script language="javascript" type="text/javascript">

function checkCombo() {
	if (current.length == combo.length) {
		return current.toString() == combo.toString();
	} else {
		for (i = 0; i < current.length; i++) {
			if (current[i] != combo[i]) {
				current = [];
				return false;
			}
		}
	}
}

// Keycodes para manisero
combo = [109, 97, 110, 105, 115, 101, 114, 111]
current = []
isPlaying = false;
isFocused = false;

$(function() {
	
	$("input").focusin(function() {
		isFocused = true;
	})
	
	$("input").blur(function() {
		isFocused = false;
	});

	$(document).keypress(function(e){
			if (!isPlaying && !isFocused) {
			current.push(e.charCode);
			if (checkCombo()) {
				isPlaying = true;
				$("#manisero").show();
			}
			}
	})
	$("#hidemanisero").click(function() {
		isPlaying = false;
		$("#manisero").hide();
	})

});

//Progressbar de me-apago
$(function() {
	$("#prgs_meapago").progressbar({
		value: 0, 
		complete: function(event, ui) { $("#meapagado").show(); location.replace("../logout.php"); }
	});
	$(".btn_meapago").click(function(){do_meapago();});

	$('#loadingFixed')
    .hide()  // hide it initially
    .ajaxStart(function() {
        $(this).show();
    })
    .ajaxStop(function() {
        $(this).hide();
    });
	

	$.post("../api/getuserinfo.php", { usuario_id : <?php echo $_SESSION['usuario_id']; ?> }, function(data) { $("#nombrePerfil").text( data.nombre )}, "json" );	
	

});

function do_meapago(){
	var currentValue = $("#prgs_meapago").progressbar("value");
	if(currentValue==0)
		$("#meapago").show();
	if(currentValue<100){
		currentValue+=10;
		$("#prgs_meapago").progressbar("value", currentValue);
		setTimeout('do_meapago()',50);
	}
}

function show_new_group(){
	document.getElementById('new_group').style.visibility="visible";
}

function cancel_new_group(){
	document.getElementById('new_group').style.visibility="hidden";
}

function load_blackboard() {
	$.post("../api/getusergroupcount.php", { usuario_id : <?php echo $_SESSION['usuario_id']; ?>, nombre : $("#group_name").val() , descripcion : $("#group_description").val()  }, function(){}, "json" ).success(function(data, textStatus, jqXHR) { location.href = "index.php?content=group_blackboard&gid="+data.grupo_id;}).error(function() { location.href = "index.php?content=intro"});
	}

$(function () {
	$("#crearGrupo").click(function () {
		$.post("../api/creategroup.php", { usuario_id : <?php echo $_SESSION['usuario_id']; ?>, nombre : $("#group_name").val() , descripcion : $("#group_description").val()  }, function(){}, "json" ).success(function(data, textStatus, jqXHR) { location.href = "index.php?content=group_blackboard&gid="+data;}).error(function() { location.href = "index.php"});
		})

})

</script>
</head>

<body>
<div id="loadingFixed"><span>Cargando...</span></div>
<div id="manisero">
<object width="480" height="360"><param name="movie" value="http://www.youtube.com/v/jTwpcCUSVhI?version=3&amp;hl=es_ES"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/jTwpcCUSVhI?version=3&amp;hl=es_ES&autoplay=1&start=9.5&autohide=1" type="application/x-shockwave-flash" width="480" height="360" allowscriptaccess="always" allowfullscreen="true"></embed></object>
<input id="hidemanisero" type="button" value="No quiero un pedaaaso" style="display:block; width: 480px"/>
</div>
<div class="new_group" id="new_group" style="height:194px">
	<div style="float:left; width:100%; height:100%">
    	
        <form id="groupForm" class="new_groupform" method="post" action="" target="_self">
        	<div style="float:left; width:100%">
            <font style="font-size:18px;">Nuevo grupo</font><br /><br />
            <input id="group_name" class="masthead-search" autocomplete="off" type="text" maxlength="50" label="Nombre del grupo" placeholder="Nombre del grupo" size="40" />
            </div>
            <div style="float:left; width:100%; margin-top:15px;">
            <textarea id="group_description" class="masthead-search" cols="40" style="height:90px; resize: none; font: 100%/1.4 Helvetica, sans-serif; font-size:13px;" label="Descripción" placeholder="Descripción"></textarea>
            </div>
            <div style="float:left; width:100%; margin-top:15px;">
            	<div style="float:left">
                	<a href="JavaScript:cancel_new_group();"><input type="button" name="cancel" id="cancel" class="button-primary" value="Cancelar" tabindex="100" /></a>
                </div>
                
                <div style="float:right">
            		<input type="button" name="submit" id="crearGrupo" class="button-primary" value="Crear" tabindex="100" />
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
                    <a href="index.php?content=profile&uid=<?php echo $_SESSION['usuario_id']; ?>" title="Perfil"><img src="images/profile.png" alt="Perfil" width="50" height="50"/></a>
                    <a href="index.php?content=notes" title="Apuntes"><img src="images/notes.png" alt="Apuntes" width="50" height="50"/></a>
                </div>
            	<div class="search">
                	<form id="searchForm" method="post" action="index.php?content=search" target="_self">		
                    
                    	<input id="searchBox" class="masthead-search" autocomplete="off" type="text" maxlength="2048" label="Buscar en UCOmparte" placeholder="Buscar en UCOmparte" size="50" name="searchQuery"/>
                        <button class="yt-uix-button" onclick="" type="submit" id="search-btn" dir="ltr" tabindex="2" role="button"><span class="yt-uix-button-content">Buscar</span></button>
                    </form>
                  
            	</div>
            </div>
            <div class="header_right">
            	<div style="float:left; padding-left:20px">
            		<a class="btn_meapago" href="#" style="color:#999;">Me apago</a>
                </div>
                <div style="float:left;">
                &nbsp;&nbsp;<a class="btn_meapago" href="#"><img src="images/user_logout.png" alt="Apagarse" /></a>
                </div>
            </div>
  		</div> 
    <!-- end .header --></div>
	<div class="center">
  <div class="sidebar1">
  	<div class="user_photo">
    	<div style="float:left;">
        	<a href="#"><img src="profilepic.php?uid=<?php echo $_SESSION['usuario_id'];?>" width="50px" height="50px" /></a>
        </div>
        <div id="nombrePerfil" class="user_name">
        </div>
    </div>
    <div class="user_group">
    	<div style="float:left; width:100%">
        	<font style="font-weight:bold;">Tus grupos</font>
  	    	<hr color="#999999" size="1px" />
            
            <!-- Se cargan los grupos a los que pertenece el usuario-->
            <?php include("mygroups.php");?>        
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
    if(!isset($_GET['content'])){
        echo "<script>load_blackboard()</script>";
    }
    else{
        if(file_exists($_GET['content'].".php"))
            require($_GET['content'].".php");
        else
            echo "Contenido no disponible";
    }
  ?>
  <div class="sidebar2">
  	SU PUBLICIDAD AQUI :D
    <!-- end .sidebar2 --></div>
    </div>
  <div class="footer">
  	<div style="margin: 0 auto; width:600px; text-align:center;">
    	<font style="color:#999;">©2011 UCOmparte</font>
    </div>
    <!-- end .footer --></div>
  <!-- end .container --></div>
  
  <div id="meapago">
	<p>Haz lo que tengas que hacer, que me apago</p> 
	<div id="prgs_meapago"></div>
  </div>
  
  <div id="meapagado"></div>
  
</body>


</html>
