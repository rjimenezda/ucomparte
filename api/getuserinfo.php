<?php

session_start();

include("../www/dataconection.php");

$queEmp = "SELECT * FROM Reporte";
$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);


if ($totEmp> 0) {
   while ($rowEmp = mysql_fetch_assoc($resEmp)) {
      echo "<strong>".$rowEmp['Recurso_id']."</strong><br>";
      echo "Direccion: ".$rowEmp['Contenido']."<br>";
   }
}


if (!isset($_POST['username'])) {
	header('HTTP/1.1 500 Internal Server Error');
	die();
}

echo "hola";

?>
