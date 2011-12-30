<?php

//Comprobacion de permisos del usuario
include("../checkauth.php");

include("../dataconnection.php");

if (!isset($_POST['grupo_id'])) {
	header('HTTP/1.1 500 Internal Server Error');
	mysql_close($conexion);
	die();
}
else {
	$queEmp = "SELECT DISTINCT B.*, CONCAT(A.nombre, ' ' ,A.apellidos) as nombre FROM (publicacion_grupo B, usuario A) INNER JOIN publicacion_grupo ON A.usuario_id = B.usuario_id WHERE B.grupo_id = (SELECT grupo_id FROM grupo_usuario WHERE grupo_id =".$_POST['grupo_id']." AND usuario_id=".$_SESSION['usuario_id'].")";
	$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
	$totEmp = mysql_num_rows($resEmp);


	if ($totEmp > 0) {
		while(($row = mysql_fetch_assoc($resEmp))) {
	   		$resultArray[] = $row;
	   	} 
	   echo json_encode($resultArray);
	}
}

mysql_close($conexion);
?>
