<?php

//Comprobacion de permisos del usuario
include("../checkauth.php");

include("../dataconnection.php");

if (!isset($_POST['asignatura_id'])) {
	header('HTTP/1.1 500 Internal Server Error');
	mysql_close($conexion);
	die();
}

else {
	# $queEmp = "SELECT * FROM recurso WHERE recurso_id IN (SELECT recurso_id FROM recurso_asignatura WHERE asignatura_id =".$_POST['asignatura_id'].")";
	$queEmp = "SELECT * FROM recursos_detalles_asignatura WHERE asignatura_id=".$_POST['asignatura_id'];
	$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
	$totEmp = mysql_num_rows($resEmp);


	if ($totEmp> 0) {
		while(($row = mysql_fetch_assoc($resEmp))) {
	   		$resultArray[] = $row;
	   	} 
	   echo json_encode($resultArray);
	}
}

mysql_close($conexion);
?>
