<?php

require_once("../conexion.php");

$id_alumno = $_GET['id_alumno'];

	if(!empty($_GET['id_grado'])){
		$id_grado = $_GET['id_grado'];

//var_dump($id_alumno);
//var_dump($id_grado);

				$seleccionar = "SELECT * FROM alumno a, reinscripcion r 
				WHERE r.id_alumno = a.id_alumno
				 AND r.id_grado = '$id_grado' 
				 AND r.id_alumno = '$id_alumno' ";
				 } else {
				 $seleccionar = "SELECT *
								FROM alumno
								WHERE id_alumno = '$id_alumno'";
				 }
				 
$ejecutar = mysql_query($seleccionar); // || die (mysql_error());

if($arreglo = mysql_fetch_assoc($ejecutar))
{
	
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Compromiso p&aacute;gina 2</title>
<style type="text/css">
<!--
.Estilo6 {font-size: 24px}
-->
</style>
</head>

<body>
<table width="792" border="0">
  <tr>
    <td>
      <p align="justify">SEGUNDO: El se&ntilde;or (a): <?php 
	  if(!empty($_GET['id_grado'])){
	  echo $arreglo['encargado_reinscripcion'];
	  } else {
	  echo $arreglo['encargado'];
	  } ?> se compromete y responsabiliza por lo siguiente:</p>
      <p align="justify">
				<ol type="a">
					<li>Velar porque su hijo (a): <?php echo $arreglo['nombre_alumno'] . ' ' . $arreglo['apellido']; ?> cumpla con todo lo consignado en el punto anterior de este compromiso;</li>
					<li>Responder directa y personalmente de lo prescrito en los literales f) y h) del punto anterior;</li>
					<li>Presentarse a la Direcci&oacute;n del Plantel y &oacute;rgano de su administraci&oacute;n cuando su presencia sea requerida; y</li>
					<li>Cuidar porque el alumno (a) cumpla con todas las medidas disciplinarias que disponga la Direcc&oacute;n del Plantel.</li>
				</ol>
			<p>&nbsp;</p>
			<p align="justify">TERCERO: Para garantizar la buena disciplina del establecimiento, as&iacute; para sancionar las faltas en que se incurra el alumno (a), la Direcci&oacute;n del Plantel podr&aacute; hacer uso de las sanciones siguientes:</p>
			<p align="justify">
				<ol type="1">
					<li>Amonestaci&oacute;n verbal</li>
					<li>Amonestaci&oacute; escrita</li>
					<li>Suspenci&oacute;n por sus estudios por un per&iacute;odo no mayor de un mes; y</li>
					<li>Cancelaci&oacute;n de la Matr&iacute;cula. En este caso, el estudiante sancionado que se encuentre en disfrute de Becas y/o Bolsa de Estudios, perder&aacute; autom&aacute;ticamente dichos beneficios.</li>
				</ol>
			</p>
			<p align="justify">
				Estas sanciones ser&aacute;n consideradas y aplicadas seg&uacute;n la gravedad de la falta o reincidencia, y se notificar&aacute; al Padre, Madre, Tutor o Encargado del alumno.
			</p>
			<p>&nbsp;</p>
			<p align="justify">CUATRO: Cuando el alumno (a) sea mayor de edad y cometa actos que sean constituidos de faltas y delitos, dentro o fuera del establecimiento educativo, ser&aacute; procesado conforme las leyes del pa&iacute;s.</p>
			<p>&nbsp;</p>
			<p align="justify">QUINTO: Los suscritos, plenamente conscientes del contenido, alcance y efectos legales del presente compromiso de responsabilidad de estudio, lo firman de conformidad, juntamente con el Director del Plantel.</p>
		</td>
  </tr>
</table>
</body>
</html>