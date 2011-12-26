<?php

//Comprobacion de permisos del usuario
include("../checkauth.php");

include("../dataconnection.php");

$queEmp = "SELECT * FROM titulacion";
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

mysql_close($conexion);
?>
