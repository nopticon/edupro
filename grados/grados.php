<?php

require_once('../conexion.php');

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.tex2 {font-family:Tahoma;
color:#000000;
font-size:12px;
}
-->
</style>
</head>

<body>

<?php

$seleccionar = "SELECT * FROM grado ORDER BY id_grado DESC";
$ejecutar = mysql_query($seleccionar);

while($arreglo = mysql_fetch_assoc($ejecutar))
{

?>

<table width="777" border="0" align="left">
	<tr>
		<td width="82"><div align="center"><img src="../images/iconos/36.ico" /></div></td>
		<td width="438" class="tex2"><?php echo $arreglo['nombre']; ?></td>
		<td width="128" class="tex2"><div align="center"><?php echo $arreglo['seccion']; ?></div></td>
		<td width="111" class="tex2"><div align="center"><?php echo $arreglo['status']; ?></div></td>
	</tr>
</table>

<?php

}

?>
</body>
</html>