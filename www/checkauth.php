<?php
session_start();

if(!isset($_SESSION['usuario_id'])) {
    session_destroy();
    header("location: /www/index.php?error='eeeeeeeeee'");
    exit();
}

?>
