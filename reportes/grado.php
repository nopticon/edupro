<div id="content" class="float-holder">
<?php

require_once('../conexion.php');

$id_alumno = $_REQUEST['id_alumno'];
$id_grado = $_REQUEST['id_grado'];

$seleccionar = "SELECT *
	FROM reinscripcion r, secciones s, grado g, alumno a
	WHERE g.id_grado = '$id_grado'
		AND r.id_alumno = '$id_alumno'
		AND r.id_seccion = s.id_seccion
		AND r.id_alumno = a.id_alumno
		AND r.id_grado = g.id_grado ";
$ejecutar = mysql_query($seleccionar);

if ($arreglo = mysql_fetch_array($ejecutar))
{
	
}

$sql = 'SELECT *
	FROM secciones s, grado g
	WHERE s.id_seccion = ' . (int) $arreglo['id_seccion'] . '
		AND s.id_grado = g.id_grado';
$ejecutar = mysql_query($sql);

$secciones = mysql_fetch_array($ejecutar);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="../style.css"  />
</head>

<body>


	<div id="content2">

	</div>
	
	<table width="98%" border="0">
		<tr>
			<td width="111">&nbsp;</td>
			<td width="127" class="text1" align="right">Carn&eacute;:</td>
			<td width="325" class="textred"><?php echo $arreglo['carne']; ?></td>
			<td width="73" class="text1" align="right">Fecha:</td>
			<td width="146" class="text2"><?php echo $arreglo['fecha']; ?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><div align="right" class="text1">Nombres y Apellidos: </div></td>
			<td class="textblack"><?php echo $arreglo['nombre_alumno']; ?><?php echo " , " ?><?php echo $arreglo['apellido']; ?></td>
			<td><div align="right" class="text1">Telefono:</div></td>
			<td class="textblack"><?php echo $arreglo['telefono1']; ?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><div align="right" class="text1">Email: </div></td>
			<td class="textblack"><?php echo $arreglo['email']; ?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
      <td><div align="right" class="text1">Grado:</div></td>
			<td class="textblack"><?php echo $arreglo['nombre'] . ', secci&oacute;n: ' . $arreglo['nombre_seccion']; ?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><div align="right" class="text1">Encargado:</div></td>
			<td class="textblack"><?php echo $arreglo['encargado_reinscripcion']; ?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</table>
	
	<br />
	<table width="95%" border="1" align="center" style="border-collapse:collapse">
		<tr>
			<td class="a_center Estilo6" width="25%">Curso</td>
			<?php
			
			$sql = 'SELECT *
				FROM examenes
				ORDER BY id_examen';
			$ejecutar = mysql_query($sql);
			
			while ($row = mysql_fetch_array($ejecutar))
			{
				echo '<td class="a_center Estilo6" width="15%">' . $row['examen'] . '</td>';
			}
			
			?>
		</tr>
		
		<?php
		
		$id_alumno = $_GET['id_alumno'];
		$id_grado = $_GET['id_grado'];
		
		$seleccionar = "SELECT *
			FROM alumno a, grado g, cursos c, reinscripcion r
			WHERE r.id_grado = g.id_grado
				AND r.id_alumno = a.id_alumno
				AND g.id_grado = c.id_grado
				AND g.id_grado ='$id_grado'
				AND a.id_alumno = '$id_alumno'";
		$ejecutar = mysql_query($seleccionar);
		
		while($arreglo9 = mysql_fetch_assoc($ejecutar))
		{
		
		?>
		<tr>
			<td class="text1"><?php echo $arreglo9['nombre_curso']; ?></td>
			<?php
			
			$sql = 'SELECT *
				FROM examenes
				ORDER BY id_examen';
			$ejecutar3 = mysql_query($sql);
			
			while ($row = mysql_fetch_array($ejecutar3))
			{
				$sql = 'SELECT *
					FROM notas
					WHERE id_alumno = ' . $arreglo9['id_alumno'] . '
						AND id_grado = ' . $arreglo9['id_grado'] . '
						AND id_curso = ' . $arreglo9['id_curso'] . '
						AND id_bimestre = ' . $row['id_examen'];
				$ejecutar20 = mysql_query($sql);
				
				$notas = mysql_fetch_assoc($ejecutar20);
				mysql_free_result($ejecutar20);
				
				echo '<td class="a_center Estilo11" width="15%">' . $notas['nota'] . '</td>';
			}
			
			?>
		</tr>
		<?php
		
		}
		?>
		</table>
		
		<br />
		<table width="95%" border="0" align="center" style="border-collapse:collapse">
			<tr>
				<td>
				<span class="textred"><strong>Observaciones:</strong></span><br /><br />
				<span class="textblack">
				De 0 a 59 puntos, reprobado.<br />
				De 60 a 100 puntos, aprobado.<br /><br /></span>
				
				<span class="textred"><strong>Faltas acad&eacute;micas:</strong></span>
		<ul>
		<?php
		
		$sql = 'SELECT *
			FROM faltas
			WHERE id_alumno = ' . (int) $arreglo9['id_alumno'] . '
			ORDER BY fecha_falta DESC
			LIMIT 3';
		$ejecutar = mysql_query($sql);
		
		$i = 0;
		while ($row = mysql_fetch_array($ejecutar))
		{
			echo '<li class="textred">' . $row['falta'] . '</li>';
			$i++;
		}
		
		if (!$i)
		{
			echo '<li class="textblack">No hay faltas.</li>';
		}
		
		?>
		</ul>
		
		<br /><br />
		<div class="a_center textblack">
		Vo. Bo.<br /><br />
		DIRECTOR.
		</div>
		<br />
		<hr />
		<span class="text1"><p>Se&ntilde;or Director:</p></span>
		<span class="textblack"><p>Yo <strong><?php echo $arreglo['encargado_reinscripcion']; ?></strong> por este medio hago constar que he quedado 
		enterado de las calificaciones de mi hijo(a): <strong><?php echo $arreglo['nombre_alumno'] . ' ' . $arreglo['apellido']; ?></strong> 
		que cursa el <?php echo $secciones['nombre']; ?>, seccion: <?php echo $secciones['nombre_seccion']; ?>.
		<p align="right">Fecha: <?php echo date('d m Y'); ?></p></span>
		<span class="textred"><p align="left">(f) _____________________________________________<br />Padre de familia o Encargado</p></span>
				</td>
			</tr>
		</table>
		
		<br />
	</form>
</div>
</div>

</body>
</html>