<?php

//Comprobacion de permisos del usuario
include("../checkauth.php");

include("../dataconnection.php");

if (!isset($_POST['grupo_id']) or !isset($_POST['nombre']) or !isset($_POST['descripcion'])) {
	header('HTTP/1.1 500 Internal Server Error');
	mysql_close($conexion);
	die();
}

else {
	$queEmp = "INSERT INTO grupo VALUES(NULL, '".$_POST['nombre']."', '".$_POST['descripcion']."', NOW())";
	$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
//	$totEmp = mysql_num_rows($resEmp);


//	if ($totEmp> 0) {
//	   while ($rowEmp = mysql_fetch_assoc($resEmp)) {
			// Imprimimos los resultados en JSON
//			echo json_encode($rowEmp);

		//	echo "<strong>".$rowEmp['Recurso_id']."</strong><br>";
		// 	echo "Direccion: ".$rowEmp['Contenido']."<br>";
//	   }
//	}
	echo 'OK';
}

mysql_close($conexion);
?>
