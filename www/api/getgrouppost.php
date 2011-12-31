<?php

//Comprobacion de permisos del usuario
include("../checkauth.php");

include("../dataconnection.php");

if (!isset($_POST['publicacion_id'])) {
	header('HTTP/1.1 500 Internal Server Error');
	mysql_close($conexion);
	die();
}

else {
	$queEmp = "SELECT  respuesta.publicacion_id, respuesta.contenido, DATE_FORMAT(respuesta.fecha, '%d %b %r') as fecha, usuario.usuario_id, CONCAT(usuario.nombre, ' ', usuario.apellidos) as nombre FROM respuesta, usuario WHERE publicacion_id = (SELECT publicacion_id FROM publicacion_grupo WHERE grupo_id IN 
			  (SELECT grupo_id FROM grupo_usuario WHERE usuario_id =".$_SESSION['usuario_id'].") AND publicacion_id = ".$_POST['publicacion_id'].") AND usuario.usuario_id = respuesta.usuario_id ORDER BY fecha";
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
