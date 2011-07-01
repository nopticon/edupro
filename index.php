<?php

session_start();

if (!isset($_SESSION['userlog']))
{
	header('Location: login.php');
	exit;
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administraci&oacute;n Escolar</title>
<link rel="stylesheet" type="text/css" href="./style.css" />
<script src="./ff.js" type="text/javascript"></script>
<script src="./jquery.js" type="text/javascript"></script>
<script src="./tmenu.js" type="text/javascript"></script>
<script src="./DD_roundies.js" type="text/javascript" ></script>

</head>

<body>

<div id="content">
<div id="content2">
	<!--
	<form name="form_reloj" id="form_reloj">
		<input type="text" name="reloj" size="10" style="background-color:#C4F0F2;  color:#990000; font-family:Tahoma; font-size : 20px; text-align : center;" onfocus="window.document.form_reloj.reloj.blur()" />
	</form>
	-->
    <div id="boton2"><img src="images/menu.png" /></div>
    <div id="boton4"><img src="images/info.jpg" /></div>
	<div id="userlog"><?php $nombre = $_SESSION['nombre'];
	echo "Bienvenido; ".$nombre; ?></div>
    <div id="boton3"><a href="exit.php"><img src="images/exit.png" /></a></div>
    
	<?php
	
	$toproot = './';
	include("menu.php");
	
	?>
	
	<br />
	<div id="logo"></div>
	<br />
</div>
</div>

</body>
</html>