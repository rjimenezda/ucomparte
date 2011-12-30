<?php

//Comprobacion de permisos del usuario
include("../checkauth.php");
include("../funciones.php");
include("../dataconnection.php");

if (!isset($_POST['usuario_id'])) {
	header('HTTP/1.1 500 Internal Server Error');
	mysql_close($conexion);
	die();
}

else {
	$queEmp = "SELECT grupo_id FROM grupo_usuario WHERE usuario_id=".$_POST['usuario_id']." LIMIT 1";
	$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
	$totEmp = mysql_num_rows($resEmp);

	if ($totEmp == 0) {
		terminate($conexion, true, "No groups");
	} else {
		$row = mysql_fetch_assoc($resEmp);
		echo json_encode($row);
	}
}

mysql_close($conexion);

?>
