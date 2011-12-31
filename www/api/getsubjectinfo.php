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
	$queEmp = "SELECT asignatura.*, titulacion.nombre as titulacion FROM asignatura, titulacion WHERE asignatura.titulacion_id = titulacion.titulacion_id AND asignatura_id=".$_POST['asignatura_id'];
	$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
	$totEmp = mysql_num_rows($resEmp);


	if ($totEmp> 0) {
		$row = mysql_fetch_assoc($resEmp);
	   echo json_encode($row);
	}
}

mysql_close($conexion);
?>
