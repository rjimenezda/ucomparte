<?php

//Comprobacion de permisos del usuario
include("../checkauth.php");

include("../dataconnection.php");

if (!isset($_POST['recurso_id'])) {
	header('HTTP/1.1 500 Internal Server Error');
	mysql_close($conexion);
	die();
}

else {
	$queEmp = "SELECT comentario_recurso.comentario_id, comentario_recurso.contenido, DATE_FORMAT(comentario_recurso.fecha, '%d %b %r'), usuario.usuario_id, usuario.nombre, usuario.apellidos FROM comentario_recurso, usuario WHERE usuario.usuario_id = comentario_recurso.usuario_id AND recurso_id=".$_POST['recurso_id'];
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
