<?php
session_start();

if(!isset($_SESSION['usuario_id'])) {
    header("location: login.php");
    session_destroy();
    exit();
}

?>
