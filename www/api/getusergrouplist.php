<?php

//Comprobacion de permisos del usuario
include("../checkauth.php");

include("../dataconnection.php");

if (!isset($_POST['usuario_id'])) {
	header('HTTP/1.1 500 Internal Server Error');
	mysql_close($conexion);
	die();
}

else {
	$queEmp = sprintf("SELECT grupo_id, nombre FROM grupo WHERE grupo_id IN (SELECT grupo_id FROM grupo_usuario WHERE usuario_id = %d)", $_POST['usuario_id']);
	$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
	$totEmp = mysql_num_rows($resEmp);

	if ($totEmp> 0) {
	   while ($rowEmp = mysql_fetch_assoc($resEmp)) {
			// Imprimimos los resultados en JSON
			echo json_encode($rowEmp);
	   }
	}
}

mysql_close($conexion);

?>
