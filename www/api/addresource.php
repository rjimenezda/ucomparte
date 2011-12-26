<?php

session_start();

include("../dataconnection.php");

if (!isset($_POST['nombre']) or !isset($_POST['descripcion']) or !isset($_POST['usuario_id']) or !isset($_POST['URL']) or !isset($_POST['tamano']) or !isset($_POST['formato'])) {
	header('HTTP/1.1 500 Internal Server Error');
	mysql_close($conexion);
	die();
}

else {
	$queEmp = "INSERT INTO recurso VALUES(NULL, '".$_POST['nombre']."', '".$_POST['descripcion']."', NOW(), ".$_POST['usuario_id'].", '".$_POST['URL']."', '".$_POST['tamano']."', '".$_POST['formato']."')";
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
