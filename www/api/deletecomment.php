<?php

session_start();

include("../dataconnection.php");

if (!isset($_POST['comentario_id'])) {
	header('HTTP/1.1 500 Internal Server Error');
	mysql_close($conexion);
	die();
}

else {
	$queEmp = "DELETE FROM comentario_recurso WHERE comentario_id=".$_POST['comentario_id'];
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