<?php
function terminate($conexion, $error = false, $errormsg = '') {
	mysql_close($conexionasd);
	
	if ($error) {
		header('HTTP/1.1 500 Internal Server Error');
		die('ERROR: '.$errormsg);
	}
	
}
?>