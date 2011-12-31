<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

//Comprobacion de permisos del usuario
include("../checkauth.php");

include("../dataconnection.php");

if (!isset($_POST['Enviado'])) {
	header('HTTP/1.1 500 Internal Server Error');
	mysql_close($conexion);
	die();
}

else {

	//TIPO PJPEG para IE
	if (isset($_POST['Enviado'])) {
		if ($_POST['Enviado']==1) {
			if ($_FILES['userfile']['type']=="image/jpeg" or //jpg, jpeg, jpe
				($_FILES['userfile']['type']=="image/pjpeg")) {
				if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {

					$rutaFichero='../you/users_images/'.$_SESSION['usuario_id'].'.jpg';
	
					echo $_FILES['userfile']['size'];
					
					if ($_FILES['userfile']['size'] > 204800) {
						mysql_close($conexion);
						header("location: /www/you/index.php?content=profile&uid=". $_SESSION['usuario_id']."&error=3");
						exit();
					}
					
					if(move_uploaded_file($_FILES['userfile']['tmp_name'], $rutaFichero)) {
						mysql_close($conexion);
						header("location: /www/you/index.php?content=profile&uid=". $_SESSION['usuario_id']);
						exit();
					} else {
						mysql_close($conexion);
						header("location: /www/you/index.php?content=profile&uid=". $_SESSION['usuario_id']."&error=1");
						exit();
					}
				}
			}	
			//En caso de que no sea un jpg, no permitir el envio
			else {
				mysql_close($conexion);
				header("location: /www/you/index.php?content=profile&uid=".$_SESSION['usuario_id']."&error=2");
				exit();
			}
		}
	}
}
mysql_close($conexion);
?>
