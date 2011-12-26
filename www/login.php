<?php

session_start();

include("dataconnection.php");

if (!isset($_POST['log']) || !isset($_POST['pwd'])) {
	header('HTTP/1.1 500 User or password not set');
	mysql_close($conexion);
	die();
}

else {
	$queEmp = "SELECT * FROM usuario WHERE Email='".$_POST['log']."'";
	$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
	$totEmp = mysql_num_rows($resEmp);

	$loginOk=false;
	if ($totEmp> 0) {
	   while ($rowEmp = mysql_fetch_assoc($resEmp)){
			if($rowEmp['Password']==$_POST['pwd']){
				$_SESSION['usuario_id'] = $rowEmp['usuario_id'];
				$loginOk=true;
				break;
			}
	   }
	}
	mysql_close($conexion);
	
	
	if($loginOk){
		header('Location: you/index.php');
		exit("Login ok");
	}
	else{
		header('Location: index.php?err=1');
		die("Login incorrecto");
	}
	
	
}


?>
