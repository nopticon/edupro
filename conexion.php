<?php
/*
$usuario = 'mipeten';
$contrasena ='m1p3t3n';
$db = 'mipeten_edupro';
*/
$usuario = 'root';
$contrasena ='';
$db = 'edupro';

$servidor = 'localhost';
//$servidor = 'mysql.mipeten.com';

$conectar = mysql_connect($servidor, $usuario, $contrasena) or die ('No se pudo conectar al servidor porque: ' . mysql_error());
$seleccionar = mysql_select_db($db) or die ('No se pudo seleccionar la base de datos porque: ' . mysql_error());

session_start();

function encabezado($titulo = '', $ruta = '', $full = true)
{
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $titulo; ?></title>
<link rel="stylesheet" type="text/css" href="../<?php echo $ruta; ?>style.css" />
<script src="../<?php echo $ruta; ?>ff.js" type="text/javascript"></script>
<script src="../<?php echo $ruta; ?>jquery.js" type="text/javascript"></script>
<script src="../<?php echo $ruta; ?>tmenu.js" type="text/javascript"></script>
<script src="../<?php echo $ruta; ?>DD_roundies.js" type="text/javascript" ></script>
</head>

<body>

<?php

if ($full)
{
	?>
<div id="header">
	<img src="../<?php echo $ruta; ?>images/normal.jpg" width="830" height="150" alt="" />
</div>
	<?php
}

}

?>