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
	$queEmp = "SELECT * FROM usuario_recurso_apunte WHERE recurso_id =".$_POST['recurso_id']." AND usuario_id = ".$_SESSION['usuario_id'];
	$resEmp = mysql_query($queEmp, $conexion) or terminate($conexion, true, mysql_error());
	
	$filas = mysql_num_rows($resEmp);
	
	if ($filas == 0) {
		terminate($conexion, true, "NO ROWS");
	} else {
		echo ("OK");
	}
}

terminate($conexion);
?>
