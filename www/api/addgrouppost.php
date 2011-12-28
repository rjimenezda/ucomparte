<?php

//Comprobacion de permisos del usuario
include("../checkauth.php");
include("../funciones.php");
include("../dataconnection.php");

if (!isset($_POST['grupo_id']) or 
	!isset($_POST['titulo']) or 
	!isset($_POST['contenido']) or 
	$_POST['titulo'] == "") {
	terminate($conexion, true, "Bad parameters");
}

else {
	
	$valQuery = "SELECT * FROM grupo_usuario WHERE grupo_id = ".$_POST['grupo_id']." AND usuario_id=".$_SESSION['usuario_id'];
	$valRes = mysql_query($valQuery, $conexion) or terminate($conexion, true, mysql_error());
	$num_rows = mysql_num_rows($valRes);
	
	if($num_rows == 0) {
		terminate($conexion, true, "No permission");
	}
	
	$queEmp = "INSERT INTO publicacion_grupo VALUES(NULL, ".$_POST['grupo_id'].", ".$_SESSION['usuario_id'].", '".$_POST['titulo']."', '".$_POST['contenido']."', NOW())";
	$resEmp = mysql_query($queEmp, $conexion) or terminate($conexion, true, mysql_error());
	
	echo mysql_insert_id($conexion);
}

terminate($conexion);
?>
