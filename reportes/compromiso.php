<?php

require_once("../conexion.php");

$id_alumno = (isset($_REQUEST) && isset($_REQUEST['id_alumno'])) ? $_REQUEST['id_alumno'] : 0;

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
$ejecutar = mysql_query($seleccionar);

if(!$arreglo = mysql_fetch_assoc($ejecutar))
{
	
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Compromiso de responsabilidad de estudios</title>
</head>

<body>
<table width="792" border="0">
	<tr>
		<td width="23">&nbsp;</td>
		<td width="729">
			<table width="754" border="0">
				<tr>
					<td width="189" align="center"><img src="../images/logo.jpg" width="110" height="117" /></td>
					<td width="555" valign="top" align="center">
						<br />MINISTERIO DE EDUCACION
						<br />ESCUELA NORMAL RURAL No.5 &quot;Prof. JULIO E. ROSADO PINELO&quot;
						<br />NIVEL DE EDUCACION MEDIA
					</td>
				</tr>
			</table>
		</td>
		<td width="18">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<p align="center"><strong>COMPROMISO DE RESPONSABILIDAD DE ESTUDIOS</strong></p>
			<p align="justify">Para estudiantes menores de edad o mayores de edad bajo la tutela de los padres o encargados. El que debe ser complemtado y firmado por las personas que se indican, PREVIO a la inscripci&oacute;n del alumno.</p>
			<p align="justify">En el municipio de Flores del departamento de Pet&eacute;n, el dia__ de _____ del a&ntilde;o___ ante el infranscrito Director de la Escuela Normal Rural No. 5 &quot;Profesor Julio Edmundo Rosado Pinelo&quot;, 
			se presenta el (la) se&ntilde;or (a):  <?php if(!empty($_GET['id_grado'])){
	  echo $arreglo['encargado_reinscripcion'];
	  } else {
	  echo $arreglo['encargado'];
	  } ?> mayor de edad, con C&eacute;dula de Vecindad N&uacute;mero de Orden <?php echo $arreglo['orden']; ?> y Registro <?php echo $arreglo['registro']; ?> extendida 
			en <?php echo $arreglo['extendida']; ?> con profesi&oacute;n u oficio <?php echo $arreglo['profesion']; ?>, laborando actualmente en <?php echo $arreglo['labora']; ?> con direcci&oacute;n en <?php echo $arreglo['direccion_labora']; ?> , 
			tel&eacute;fono: <?php echo $arreglo['telefono2']; ?> , manifiesta que es: <?php echo $arreglo['emergencia']; ?> del alumno (a): <?php echo $arreglo['nombre_alumno']; ?><?php echo " , " ?><?php echo $arreglo['apellido']; ?> de 
			<?php echo $arreglo['edad']; ?> de edad, cursante del <?php echo $arreglo['id_grado']; ?> con direccion en <?php echo $arreglo['direccion']; ?> tel&eacute;fono <?php echo $arreglo['telefono1']; ?>, quien por este medio o acto suscriben 
			El presente COMPROMISO DE RESPONSABILIDAD DE ESTUDIO de acuerdo a las Cl&aacute;usulas que se se&ntilde;alan en los siguientes puntos: </p>
			<p>PRIMERO: Que el alumno (a): <?php echo $arreglo['nombre_alumno']; ?><?php echo " , " ?><?php echo $arreglo['apellido']; ?>
			se compromete a cumplir con las obligaciones que le impone el Articulo 34 de la Ley de Educaci&oacute;n Nacional, Decreto
			No. 12-91 del Congreso de la Rep&uacute;blica, con el Reglamento Interno del Centro Educativo y con lo siguiente:<br />
			</p>
			
			<ol type="a">
				<li>Cumplir con todas las obligaciones inherentes a su calidad de alumno y las que sean establecidas por las autoridades educativas, y espec&iacute;ficamente por el Director del Plantel, Personal T&eacute;cnico-Administrativo, y Catedr&aacute;ticos;
				<li>Respectar a las autoridades T&eacute;cnico-Administrativas, a los Docentes y Estudiantes del Plantel;
				<li>Observar buena conducta en todos sus actos, tanto dentro como fuera del Plantel;
				<li>Asistir puntualmente y diariamente a sus clases. Si por causa justificada no pudiera hacerlo, deber&aacute; presentar excusa escrita a la Direcci&oacute;n del Plantel, firmada por el Padre, Madr&eacute; o Encargado;
				<li>Abstenerse de participar en su per&iacute;odo de estudio en el Plantel, en actividades no aurotrizadas por la Direccion del establecimiento;
				<li>Colaborar por mantener en buenas condiciones el edificio, sus instalaciones, mobiliario y equipo del plantel;
				<li>Asistir con presentaci&oacute;n personal adecuada en cuanto a higiene corporal y de vestuario;
				<li>Pagar &iacute;ntegramente, El valor de los libros, equipo, &uacute;tiles, mobiliario e instalaciones de cuya p&eacute;rdida, deterioro o destrucci&oacute;n resulte individual o grupalmente responsable;
				<li>Rendir el respeto que se merece nuestro s&iacute;mbolos patrios, participar en actos y eventos de car&aacute;cter c&iacute;vico que se programen por el Ministerio de Educaci&oacute;n o por el Plantel Educativo.
			</ol>
		</td>
	</tr>
</table>

</body>
</html>