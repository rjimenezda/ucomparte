<?php

//Comprobacion de permisos del usuario
include("../checkauth.php");
include("../funciones.php");
include("../dataconnection.php");

if (!isset($_POST['recurso_id']) or
	$_POST['recurso_id'] == '' or 
	$_POST['recurso_id'] < 0 or
	!is_numeric($_POST['recurso_id'])) {
	terminate($conexion, true, "Bad Parameters");
}

else {
	$queEmp = "INSERT INTO usuario_recurso_apunte VALUES(".$_SESSION['usuario_id'].", ".$_POST['recurso_id'].")";
	$resEmp = mysql_query($queEmp, $conexion) or terminate($conexion, true, mysql_error());
}

terminate($conexion);
?>
