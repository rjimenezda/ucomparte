<?php

//Comprobacion de permisos del usuario
include("../checkauth.php");

include("../dataconnection.php");
include ("../funciones.php");

if (!isset($_POST['grupo_id']) or
	$_POST['grupo_id'] < 0 or
	!is_numeric($_POST['grupo_id'])) {
	terminate($conexion, true, "Bad parameters");
}

else {
	$queEmp = "INSERT INTO grupo_usuario VALUES(".$_POST['grupo_id'].", ".$_SESSION['usuario_id'].")";
	$resEmp = mysql_query($queEmp, $conexion) or terminate($conexion, true, mysql_error($conexion));
}

terminate($conexion);
?>
