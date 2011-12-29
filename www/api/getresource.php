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
	$queEmp = "SELECT usuario.nombre as nombre_usuario, usuario.apellidos, detalles_recursos.recurso_id, detalles_recursos.URL, detalles_recursos.usuario_id, detalles_recursos.nombre, detalles_recursos.descripcion, detalles_recursos.tamano, detalles_recursos.meloapuntos FROM usuario INNER JOIN detalles_recursos ON usuario.usuario_id = detalles_recursos.usuario_id WHERE detalles_recursos.recurso_id = ".$_POST['recurso_id'];
	$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
	$totEmp = mysql_num_rows($resEmp);


	if ($totEmp> 0) {
	   while ($rowEmp = mysql_fetch_assoc($resEmp)) {
			// Imprimimos los resultados en JSON
			echo json_encode($rowEmp);

		//	echo "<strong>".$rowEmp['Recurso_id']."</strong><br>";
		// 	echo "Direccion: ".$rowEmp['Contenido']."<br>";
	   }
	}
}

mysql_close($conexion);
?>
