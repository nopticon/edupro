<?php

require_once('../../conexion.php');

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.text1{
color:#000000;
font-family:Tahoma;
font-size:11px;
}

.Estilo11 {color: #990000}
.text2 {font-family:tahoma;
color:#000000;
font-size:12px;
}
a:link {
	color: #009900;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #009900;
}
a:hover {
	text-decoration: underline;
	color: #990000;
}
a:active {
	text-decoration: none;
	color: #009900;
}
-->
</style>
</head>

<body>

<table width="745" border="0">
  <tr>
    <td width="22">&nbsp;</td>
    <td width="10">&nbsp;</td>
    <td width="260"><div align="center" class="Estilo11">Nombre del Curso </div></td>
    <td width="89"><div align="center" class="Estilo11">Capacidad</div></td>
    <td width="342" class="Estilo11"><div align="center">Grado</div></td>
  </tr>
</table>
<br />

<?php

$seleccionar = "SELECT * FROM cursos c, grado g WHERE g.id_grado = c.id_grado ";
$ejecutar = mysql_query($seleccionar);

while($arreglo = mysql_fetch_assoc($ejecutar))
{

?>

<br />
<table width="746" border="0">
	<tr>
		<td width="20">&nbsp;</td>
		<td width="35"><span class="text2"><img src="../../images/iconos/226.ico" border="0" /></span></td>
		<td width="239"><div align="center" class="Estilo11">
			<div align="left" class="text1"><?php echo $arreglo['nombre_curso']; ?></a></div>
		</div></td>
		<td width="90"><div align="center" class="text1"><?php echo $arreglo['capacidad']; ?></div></td>
		<td width="340" class="Estilo11"><div align="center" class="text2"></a></div>
		<div align="left" class="text1"><?php
		
		$conteo = $arreglo['id_grado'];
		
		switch($conteo)
		{
			case $arreglo['id_grado']:
				echo $arreglo['nombre'] , $arreglo['seccion'];
				break;
		}
		
		?></div></td>
	</tr>
</table>

<?php

}

?>
<br />
</body>
</html>