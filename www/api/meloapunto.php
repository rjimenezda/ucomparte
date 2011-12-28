<?php

//Comprobacion de permisos del usuario
include("../checkauth.php");

include("../dataconnection.php");

if (!isset($_POST['recurso_id']) or
	$_POST['recurso_id'] == '' or 
	$_POST['recurso_id'] < 0 or
	!is_numeric($_POST['recurso_id'])) {
	header('HTTP/1.1 500 Internal Server Error');
	mysql_close($conexion);
	die();
}

else {
	$queEmp = "INSERT INTO usuario_recurso_apunte VALUES(".$_SESSION['usuario_id'].", ".$_POST['recurso_id'].")";
	$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());

	echo 'OK';
}

mysql_close($conexion);
?>
