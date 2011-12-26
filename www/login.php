<?

session_start();

include("../dataconnection.php");

if (!isset($_POST['user_login']) || !isset($_POST['user_pass'])) {
	header('HTTP/1.1 500 Internal Server Error');
	mysql_close($conexion);
	die();
}

else {
	$queEmp = "SELECT * FROM usuario WHERE Email=".$_POST['user_login'];
	$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
	$totEmp = mysql_num_rows($resEmp);

	$loginOk=false;
	if ($totEmp> 0) {
	   while ($rowEmp = mysql_fetch_assoc($resEmp)){
			if(rowEmp["Password"]==$_POST['user_pass']){
				$_SESSION["usuario_id"] = rowEmp["usuario_id"];
				$loginOk=true;
				break;
			}
	   }
	}
	mysql_close($conexion);
	
	
	if($loginOk){
		header('Location: you/index.html');
		exit();
	}
	else{
		header('Location: index.html?err=1');
		die("Login incorrecto");
	}
	
	
}


?>