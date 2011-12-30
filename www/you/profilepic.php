<?php
if (!isset($_GET['uid'])) die();

if (file_exists("users_images/".$_GET['uid'].".jpg")) {
	$imagepath = "users_images/".$_GET['uid'].".jpg";
} else {
	$imagepath = "users_images/default_male.jpg";
}

$im = file_get_contents($imagepath); 
header('content-type: image/jpeg'); 
echo $im;

?>