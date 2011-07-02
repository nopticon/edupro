<?php

$usuario = 'root';
$contrasena ='sistemapeten';
$db = 'edupro';

$servidor = 'localhost';

$conectar = mysql_connect($servidor, $usuario, $contrasena) or die ('No se pudo conectar al servidor porque: ' . mysql_error());
$seleccionar = mysql_select_db($db) or die ('No se pudo seleccionar la base de datos porque: ' . mysql_error());

session_start();

function encabezado($titulo = '', $ruta = '', $full = true)
{
?><!DOCTYPE HTML>
<html>
<head>
<meta charset="iso-8859-1" />
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