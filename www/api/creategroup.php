<?php

//Comprobacion de permisos del usuario
include("../checkauth.php");
include("../funciones.php");
include("../dataconnection.php");

if (!isset($_POST['nombre']) or 
	!isset($_POST['descripcion']) or
	$_POST['nombre'] == "") {
	terminate($conexion, true, "Bad parameters");
}

else {
	$queEmp = "INSERT INTO grupo VALUES(NULL, '".$_POST['nombre']."', '".$_POST['descripcion']."', NOW())";
	$resEmp = mysql_query($queEmp, $conexion) or terminate($conexion, true, mysql_error());
	
	// Devolvemos el id numérico del último grupo insertado
	$group_id = mysql_insert_id($conexion);
	echo $group_id;
	
	// Insertamos al usuario en el grupo que ha creado
	$query = "INSERT INTO grupo_usuario (grupo_id, usuario_id) VALUES(".$group_id.", ".$_SESSION['usuario_id'].")";
	echo $query;
	$resEmp = mysql_query($query, $conexion) or terminate($conexion, true, mysql_error());
}

terminate($conexion);
?>
