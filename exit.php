<?php
require_once('conexion.php');


unset($_SESSION['userlog']);
//var_dump($_SESSION['userlog']);
session_destroy();
header("Location: login.php");
//var_dump($_SESSION['userlog']);
?>