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
	// Aquí no usamos $_SESSION['usuario_id']j por poder consultar los "meloapuntos" de otro
	// Hace falta otra consulta para sacar cuánta gente en total se lo ha apuntado :(
	$queEmp = "SELECT usuario_recurso_apunte.recurso_id, recurso.nombre, recurso.formato, recurso.tamano FROM recurso, usuario_recurso_apunte WHERE usuario_recurso_apunte.usuario_id =".$_POST['usuario_id']." AND recurso.recurso_id = usuario_recurso_apunte.recurso_id";
	//$queEmp = "SELECT recurso_id FROM usuario_recurso_apunte WHERE usuario_id=".$_POST['usuario_id'];
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
