<?php

//Comprobacion de permisos del usuario
include("../checkauth.php");

include("../dataconnection.php");

if (!isset($_GET['patron_busqueda'])) {
	header('HTTP/1.1 500 Internal Server Error');
	mysql_close($conexion);
	die();
}

else {
	$queEmp = "SELECT asignatura.asignatura_id, asignatura.nombre, titulacion.nombre as titulacion FROM asignatura, titulacion WHERE asignatura.titulacion_id  = titulacion.titulacion_id AND asignatura.nombre LIKE '%".$_GET['patron_busqueda']."%'";
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
