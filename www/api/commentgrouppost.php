<?php

//Comprobacion de permisos del usuario
include("../checkauth.php");
include("../funciones.php");
include("../dataconnection.php");

if (!isset($_POST['publicacion_id']) or 
	!isset($_POST['contenido']) or
	$_POST['contenido'] == "") {
	terminate($conexion, true, "Bad Parameters");
}

else {
	
	// Comprobamos si el usuario está en el grupo de esa publicación con una consulta super reshulona que me he inventado
	$valQuery = "SELECT grupo_usuario.usuario_id FROM publicacion_grupo INNER JOIN grupo_usuario ON publicacion_grupo.grupo_id = grupo_usuario.grupo_id WHERE publicacion_id =".$_POST['publicacion_id']." AND grupo_usuario.usuario_id =".$_SESSION['usuario_id'];
	$valRes = mysql_query($valQuery, $conexion) or terminate($conexion, true, mysql_error());
	$num_rows = mysql_num_rows($valRes);
	
	if ($num_rows == 0) {
		terminate($conexion, true, "No permission");
	}
	
	$queEmp = "INSERT INTO respuesta VALUES(NULL, ".$_SESSION['usuario_id'].", ".$_POST['publicacion_id'].", '".$_POST['contenido']."', NOW())";
	$resEmp = mysql_query($queEmp, $conexion) or terminate($conexion, true, mysql_error());
}

terminate($conexion);
?>
