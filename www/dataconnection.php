<?php

// Sin esto los usuarios podrían acceder a esta pantalla y liarnos un buen memory leak xD
if (!isset($_SESSION)) {
	die("Session no establecido");
}

$conexion = mysql_connect("localhost", "root", "root");

mysql_select_db("ucomparte", $conexion);

?>
