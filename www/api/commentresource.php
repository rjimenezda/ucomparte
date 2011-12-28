<?php

//Comprobacion de permisos del usuario
include("../checkauth.php");
include("../funciones.php");
include("../dataconnection.php");

if (!isset($_POST['recurso_id']) or
	!isset($_POST['contenido']) or
	!is_numeric($_POST['recurso_id']) or 
	$_POST['contenido'] == "") {
	terminate($conexion, true, "Bad Parameters");
}

else {
	$queEmp = "INSERT INTO comentario_recurso VALUES(NULL, ".$_POST['recurso_id'].", ".$_SESSION['usuario_id'].", '".$_POST['contenido']."', NOW())";
	$resEmp = mysql_query($queEmp, $conexion) or terminate($conexion, true, mysql_error());
}

terminate($conexion)
?>
