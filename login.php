<?php

require_once("./conexion.php");


if(isset($_SESSION['userlog']))
{
 header('location: index.php');
}

if (isset($_POST['submit']))
{
	$username = $_POST['username'];
	$key = $_POST['key'];
	
	$sql = "SELECT *
		FROM usuarios
		WHERE usuario = '" . $username . "'
			AND password = '" . $key . "'";
	$ejecutar = mysql_query($sql) or die(mysql_error());
	
	if ($row = mysql_fetch_array($ejecutar))
	{
		$_SESSION['userlog'] = $row['usuario'];
		$_SESSION['nombre'] = $row['nombre'];
		
		header('Location: index.php');
		exit;
	}
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administraci&oacute;n Escolar</title>
<link rel="stylesheet" type="text/css" href="./style.css" />

</head>

<body>
<div id="content">
<div id="content2">
	<form actiion="./login.php" method="post">
	
	<div align="center">
	  <p><img src="images/92091501.jpg" width="350" height="278" /></p>
	
		Usuario: <input type="text" name="username" value="" />
		<br /><br />
		Contrase&ntilde;a: <input type="password" name="key" value="" />
		<br /><br />
		<input type="submit" name="submit" value="Continuar" />
		
	</div>
	<br />
	</form>
</div>
</div>

</body>
</html>