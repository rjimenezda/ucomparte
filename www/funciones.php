<?php
function terminate($error = false) {
	mysql_close($conexion);
	
	if ($error) {
		header('HTTP/1.1 500 Internal Server Error');
		die();
	}
}
?>