<?php

require_once('../conexion.php');

if (!isset($_REQUEST['id_falta']))
{
	header('Location: index.php');
	exit;
}

$id_falta = $_REQUEST['id_falta'];

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Listado de &Uacute;ltimos Ingresos de Faltas Acad&eacute;micas</title>
<style type="text/css">
.text2{
font-family:tahoma;
color:#000000;
font-size:12px;
}

.text1{
font-family:Tahoma;
color:#339933;
font-size:13px;
}
</style>
<style type="text/css">
<!--
input{
-moz-border-radius: 5px;
background-color : #eaf9ff;
border : 1px solid #000000;
font-family : "Tahoma", Tahoma, monospace;
font-size : 12px;
padding-left : 7px;
padding-right : 7px;
}

body {
	background-color: #FCFBE9;
}
.Estilo4 {color: #990000; font-weight: bold; }
.Estilo6 {font-family: Tahoma; font-size: 14px; color: #FFFFFF;}
.text11 {color:#000000;
font-size:11px;
font-family:Tahoma;
}
.Estilo8 {
	color: #000000;
	font-size: 11px;
	font-family: Tahoma;
	font-weight: bold;
	font-style: italic;
}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: underline;
	color: #990000;
}
a:active {
	text-decoration: none;
	color: #000000;
}
</style>
</head>
<?php
				
				$seleccionar = "SELECT *
					FROM alumno a, faltas f
					WHERE f.id_falta = '$id_falta'
						AND a.id_alumno = f.id_alumno ";
				$ejecutar = mysql_query($seleccionar);
				
				$arreglo = mysql_fetch_assoc($ejecutar);
				
				?>
<body>
<div align="center">
<table width="800" align="center">
	<tr>
		<td width="806" bgcolor="#4682B4"><div align="center" class="Estilo6">&Uacute;ltima Falta Ingresada del alumno : <?php echo $arreglo['nombre_alumno'];?></div></td>
	</tr>
	<tr>
		<td>
			<table width="690" border="0">
  <tr>
					<td width="194">&nbsp;</td>
					<td width="14">&nbsp;</td>
					<td width="326">&nbsp;</td>
					<td width="242" align="center"><input type="button" value="Cerrar Pestaña" onclick="self.close()" /></td>
			  </tr>
				
				<tr>
					<td><div align="right" class="Estilo4"><?php echo $arreglo['carne']; ?></div></td>
					<td>&nbsp;</td>
					<td class="text2"><?php echo $arreglo['apellido']; ?><?php echo " , "  ?><?php echo $arreglo['nombre_alumno']; ?></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><div align="right" class="text1">Fecha de Ingreso de Falta: </div></td>
					<td>&nbsp;</td>
					<td class="text2"><?php echo $arreglo['fecha_falta']; ?></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td class="text2">&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><div align="right" class="text1">Falta Acad&eacute;mica: </div></td>
					<td>&nbsp;</td>
					<td class="text2"><?php echo $arreglo['falta']; ?></td>
					<td>&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

</div>
</body>
</html>

<script language="JavaScript" type="text/javascript">
//<![CDATA[
document.formulario.encargado.focus();

function alerta() {
	return window.confirm("¿Seguro que desea Realizar la Acción...?");
}
//]]>
</script>