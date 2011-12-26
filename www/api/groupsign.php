<?php

//Comprobacion de permisos del usuario
include("../checkauth.php");

include("../dataconnection.php");
include ("../funciones.php");

if (!isset($_POST['grupo_id']) or !isset($_POST['usuario_id'])) {
	terminate(true);
}


else {
	$queEmp = "INSERT INTO grupo_usuario VALUES(".$_POST['grupo_id'].", ".$_POST['usuario_id'].")";
	$resEmp = mysql_query($queEmp, $conexion) or terminate(true);
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

terminate();
?>
