<?php

session_start();

if (!isset($_POST['name']) or  
	!isset($_POST['surname']) or
	!isset($_POST['degree']) or
	!isset($_POST['town']) or 
	!isset($_POST['province']) or
	!isset($_POST['birthdate']) or
	!isset($_POST['name']) or 
	!isset($_POST['log']) or
	!isset($_POST['pwd'])) {
		die();
	}
	
	

?>