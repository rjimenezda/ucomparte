<?php

session_start();

include('../www/dataconnection.php');

error_reporting(E_ALL);
ini_set('display_errors', '1');

$query = "";

if ($_POST['name'] === '' or  
	$_POST['surname'] === '' or
	$_POST['degree'] === '' or
	$_POST['town'] === '' or 
	$_POST['province'] === '' or
	$_POST['birthdate'] === '' or
	$_POST['name'] === '' or 
	$_POST['log'] === '' or
	$_POST['pwd'] === '') {
		die("Form invalido");
	} else {
		
		if (strlen($_POST['log']) <= 15) {
			$query = sprintf('INSERT INTO usuario (email, password, es_administrador, nombre, apellidos, pais, localidad, provincia, sexo, fecha_nacimiento, fecha_alta) 
								values("%s", "%s",%d,"%s","%s", "%s","%s", "%s", "%s", NOW(), NOW())',
							$_POST['log'], $_POST['pwd'], 0, $_POST['name'], $_POST['surname'], $_POST['degree'], $_POST['town'], $_POST['province'], $_POST['sex']);
			
			mysql_query($query);
			mysql_close($conexion);
		} else {
			die("Illegal email");	
		}
		
	}

?>
