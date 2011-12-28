<?php

//Comprobacion de permisos del usuario
include("../checkauth.php");
include("../funciones.php");
include("../dataconnection.php");

if (!isset($_POST['comentario_id']) or
	$_POST['comentario_id'] < 0 or 
	!is_numeric($_POST['comentario_id'])) {
	terminate($conexion, true, "Bad Parameters");
}

else {
	$queEmp = "DELETE FROM comentario_recurso WHERE comentario_id=".$_POST['comentario_id']." AND usuario_id=".$_SESSION['usuario_id'];
	$resEmp = mysql_query($queEmp, $conexion) or terminate($conexion, true, mysql_error());
	
	if (mysql_affected_rows($conexion) == 0) {
		terminate($conexion, true, "No rows affected");
	}
	
}

terminate($conexion);
?>
