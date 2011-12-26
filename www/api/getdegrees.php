<?php

//Comprobacion de permisos del usuario
include("../checkauth.php");

include("../dataconnection.php");

$queEmp = "SELECT * FROM titulacion";
$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$resultArray = array();
if ($totEmp> 0) {
   while(($row = mysql_fetch_assoc($resEmp))) {
   	$resultArray[] = $row;
   } 
   echo json_encode($resultArray);
}

mysql_close($conexion);
?>
