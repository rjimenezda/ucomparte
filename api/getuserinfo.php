<?php

session_start();

if (!isset($_POST['username'])) {
	header('HTTP/1.1 500 Internal Server Error');
	die();
}

echo "hola";

?>
