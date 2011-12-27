<?php

//Esta API
//
//Devuelve una cadena:
//"OK": Se ha subido el recurso correctamente
//"ERRORFORMATO": El formato del fichero no es correcto
//"ERROR": Ha existido un error al intentar subir el fichero al servidor



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
				($_FILES['userfile']['type']=="image/pjpeg") or
				($_FILES['userfile']['type']=="image/gif") or //gif
				($_FILES['userfile']['type']=="application/pdf") or //pdf
				($_FILES['userfile']['type']=="application/x-latex") or //latex
				($_FILES['userfile']['type']=="multipart/x-zip") or //zip
				($_FILES['userfile']['type']=="multipart/x-gzip") or //gz, gzip
				($_FILES['userfile']['type']=="application/x-tar") or //tar
				($_FILES['userfile']['type']=="application/zip") or //man
				($_FILES['userfile']['type']=="application/gnutar") or //tgz
				($_FILES['userfile']['type']=="application/x-rar") or //rar
				($_FILES['userfile']['type']=="application/x-rar-compressed") or //rar
				($_FILES['userfile']['type']=="text/plain") or //txt, g, h, c, cc, hh, m, f90
				($_FILES['userfile']['type']=="application/mspowerpoint") or //pot, pps, ppz, ppt, ppa, 
				($_FILES['userfile']['type']=="application/msword") or //doc, dot
				($_FILES['userfile']['type']=="application/vnd.ms-excel") or //xlb, xlc, xll, xlm, xls, xlw
				($_FILES['userfile']['type']=="application/x-excel") or //xla, xlb, xlc, xld, xlk, xll, xlm, xls, xlt, xlv, xlw
				($_FILES['userfile']['type']=="application/richtext") //rt, rtf, rtx
			) {
				if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
				
					//Extrae el formato
					$longFormato=strlen($_FILES['userfile']['name']);
					$formato = substr($_FILES['userfile']['name'], $longFormato-3,$longFormato); //recuerda que empieza en 0 

					$nombre_fichero=time().'__'.$_FILES['userfile']['name'];
					$rutaFichero='../you/resources/'.$nombre_fichero;
					$URL='resources/'.$nombre_fichero;
					$tamano=$_FILES['userfile']['size']." KB";
					if(move_uploaded_file($_FILES['userfile']['tmp_name'], $rutaFichero)) {
						
						//Agregamos el nuevo recurso a la BD
						$queEmp = "INSERT INTO recurso VALUES(NULL, '".$_POST['nombre']."', '".$_POST['descripcion']."', NOW(), ".$_SESSION['usuario_id'].", '".$URL."', '".$tamano."', '".$formato."')";
						$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());

						echo "OK"; //El archivo se ha subido correctamente
					}
					else {
						echo "ERROR"; //No se ha podido subir la foto
						// print_r($_FILES);
					}
				}
			}	
			//En caso de que no sea un jpg, no permitir el envio
			else echo "ERRORFORMATO";
		}
	}
}
mysql_close($conexion);
?>
