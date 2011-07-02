<?php

require_once('conexion.php');

unset($_SESSION['userlog']);

session_destroy();
header("Location: login.php");

?>