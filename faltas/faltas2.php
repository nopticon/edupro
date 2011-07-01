<div id="content" class="float-holder">
<?php

require_once('../conexion.php');

$carne = $_GET['carne1'];
//$carne = $_GET['carne'];
//$id_grado = $_GET['id_grado']; AND r.id_grado = g.id_grado AND g.id_grado = '$id_grado'
		
		$anio = date('Y');
//var_dump($id_alumno);
$seleccionar = "SELECT *
	FROM reinscripcion r,  grado g, alumno a
	WHERE  r.carne = '$carne'
	AND r.id_alumno = a.id_alumno
	AND r.id_grado = g.id_grado	
	AND r.anio = '$anio'";

$ejecutar = mysql_query($seleccionar); // || die (mysql_error());

if (!$arreglo = mysql_fetch_array($ejecutar))
{
	header('location: index.php');
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Mis Faltas</title>
<link rel="stylesheet" type="text/css" href="../style.css"  />

<style type="text/css">
<!--
.Estilo7 {font-size: 9px}
-->
</style>
</head>

<body>


	<div id="content2">
	
		
		<div class="textred" align="center" style="font-size:17px;">Informaci&oacute;n Faltas del <?php echo date('Y');?> </div>
	</div>
	<table width="804" border="0">
		<tr>
			<td width="111">&nbsp;</td>
			<td width="127" class="text1"><div align="right">Carn&eacute;:</div></td>
			<td width="325" class="textred"><?php echo $arreglo['carne']; ?></td>
			<td width="73" class="text1">&nbsp;</td>
			<td width="146">&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><div align="right" class="text1">Nombres y Apellidos: </div></td>
			<td class="text2"><?php echo $arreglo['nombre_alumno']; ?><?php echo " , " ?><?php echo $arreglo['apellido']; ?></td>
			<td>&nbsp;</td>
			<td class="text2">&nbsp;</td>
		</tr>
		
		<tr>
			<td>&nbsp;</td>
      <td><div align="right" class="text1">Grado:</div></td>
			<td class="text2"><?php echo $arreglo['nombre']; ?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><div align="right" class="text1">Encargado:</div></td>
			<td class="text2"><?php echo $arreglo['encargado_reinscripcion']; ?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</table>
	
	<br />
	<br />
	<table width="780" border="0" align="center">
          <tr>
            <td width="134" class="title2">Fecha de Ingreso</td>
            <td width="500" class="title">Descripci&oacute;n de Falta (s):</td>
            <td width="132" class="title2">Tipo de Falta</td>
          </tr>
        </table>
		<br />
        <?php 
		$carne1 = $_GET['carne1'];
		
		$carne = substr($carne1,5);
		//var_dump($carne);
		$anio = date('Y');
		
		$seleccion = "SELECT * FROM alumno a, faltas f
		WHERE a.id_alumno = f.id_alumno
		AND f.id_alumno = '$carne'
		AND f.anio_falta = '$anio'
		ORDER BY f.fecha_falta DESC";
		
		
		
		$ejecutar = mysql_query($seleccion);
		
		while($row = mysql_fetch_array($ejecutar)){
		?>
		<table width="780" border="0" align="center" style="border-collapse:collapse">
			<tr>
			  <td width="18%" bgcolor="#F9FBC6"><div align="center"><?php echo $row['fecha_falta'];?></div></td>
			  <td width="64%" bgcolor="#CEF5FF"><?php echo $row['falta'];?></td>
				<td width="18%" bgcolor="#FEBEBC"><div align="center"><?php echo $row['tipo_falta'];?></div></td>
		  </tr>
	  </table>
		
	 
        <table width="780" border="0" align="center">
          <tr>
            <td bgcolor="#DFFFC1">&nbsp;</td>
          </tr>
        </table>
      <?php }?>
	  <div align="center"><br />
        </div>
 </div>
</div>

<script type="text/javascript">
document.formulario.carne.focus();

function alerta(){
return window.confirm("Seguro que desea Realizar la Accion...?");}
</script>

</body>
</html>