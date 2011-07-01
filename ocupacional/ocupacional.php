<div id="content" class="float-holder">
<?php
require_once('../conexion.php');

$grado = $_REQUEST['grado'];
$seccion = $_REQUEST['seccion'];
$anio = $_REQUEST['anio'];

$sql = "SELECT *
	FROM grado g, secciones s
	WHERE g.id_grado ='$grado'
		AND s.id_seccion = '$seccion'
		AND g.id_grado = s.id_grado";
$ejecutar = mysql_query($sql);

$arreglo = mysql_fetch_assoc($ejecutar);

$sql = 'SELECT * FROM ocupacion_alumno';
$ejecutar = mysql_query($sql);

$ocup = array();
while ($row = mysql_fetch_assoc($ejecutar))
{
	$ocup[$row['id_alumno']] = $row['id_ocupacion'];
}

?>

<div id="boton1"><a href="../index.php"><img src="../images/inicio.png" border=0; /></a></div>
<div id="boton2"><img src="../images/menu.png" /></div>
<div id="boton4"><img src="../images/info.jpg" /></div>
<div id="userlog"><?php $nombre = $_SESSION['nombre'];
	echo "Bienvenido; ".$nombre; ?></div>
<div id="boton3"><a href="../exit.php"><img src="../images/exit.png" /></a></div>
	
	    <?php include('../menu.php');
		encabezado('Asignaci&oacute;n de Areas Ocupacionales'); ?>
		<div id="content2">
		<div class="title">Asignaci&oacute;n de Areas Ocupacionales</div>
	</div>
	
	<div class="blue">
		<table width="98%" border="0">
			<tr>
				<td width="58">&nbsp;</td>
				<td width="681" class="Estilo6" style="font-size: 12px">Nombre del Grado: <?php echo $arreglo['nombre'] . '<br/> <br/> Secci&oacute;n: ', $arreglo['nombre_seccion']; ?></td>
				<td width="23"><div align="center"><a href="../index.php"><img src="../images/logo.jpg" width="110" height="117" border="0" title="Ir al inicio..." /></a></div></td>
			</tr>
		</table>
		<br />
		<form id="form1" name="form1" method="post" action="cod_act.php">
			<table width="100%">
				<?php
				
				$sql = "SELECT *
					FROM alumno a, grado g, reinscripcion r
					WHERE r.id_alumno = a.id_alumno
						AND g.id_grado = r.id_grado
						AND r.id_grado = '$grado'
						AND r.id_seccion = '$seccion'
						AND r.anio = '$anio'
					ORDER BY a.apellido, a.nombre_alumno ASC";
				$ejecutar = mysql_query($sql);
				
				$i = 0;
				while ($arreglo = mysql_fetch_assoc($ejecutar))
				{
				
				?>
				<tr>
					<td width="25%" align="center"><?php echo $arreglo['carne']; ?></td>
					<td width="50%"><?php echo $arreglo['apellido'] . ', ' . $arreglo['nombre_alumno']; ?></td>
					<td width="25%">
						<?php
						
						$sql2 = "SELECT * FROM area_ocupacional";
						$ejecutar2 = mysql_query($sql2);
						
						echo '<select name="nombre_ocupacion['. $arreglo['id_alumno'] .']"><option value=""></option>';
						
						while ($arreglo2 = mysql_fetch_array($ejecutar2))
						{
							$sel = (isset($ocup[$arreglo['id_alumno']]) && $ocup[$arreglo['id_alumno']] == $arreglo2['id_ocupacion']);
							
							echo '<option value="' . $arreglo2['id_ocupacion'] . '"' . (($sel) ? ' selected="selected"' : '') . '>' . $arreglo2['nombre_ocupacion'] . '</option>';
						}
						
						echo '</select>';
						
						?>
						
						</td>
				</tr>
				
				<?php
				
					$i++;
				}
				
				?>
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="3" align="center"><input type="submit" name="Submit" value="Guardar" /></td>
				</tr>
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="3">Total de alumnos: <?php echo $i; ?></td>
				</tr>
			</table>
		</form>
	</div>
</div>
<?php include('../menucss.php');?>
</body>
</html>