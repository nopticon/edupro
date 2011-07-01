<div id="content" class="float-holder">
<?php
require_once('../conexion.php');

$seccion = $_POST['grado'];
$curso = $_POST['curso'];
$examen = $_POST['examen'];
$anio = $_POST['anio'];
?>

<div id="boton1"><a href="../index.php"><img src="../images/inicio.png" border=0; /></a></div>
<div id="boton2"><img src="../images/menu.png" /></div>
<div id="boton4"><img src="../images/info.jpg" /></div>
<div id="userlog"><?php $nombre = $_SESSION['nombre'];
	echo "Bienvenido; ".$nombre; ?></div>
<div id="boton3"><a href="../exit.php"><img src="../images/exit.png" /></a></div>

	    <?php include('../menu.php'); 
		encabezado('Ingreso de Calificaciones'); ?>
			<div id="content2">
		<div class="title">Ingreso de Notas</div>
	</div>
	
	<div class="blue">
		<form action="./cod_notas.php" method="post" name="formulario" id="formulario" onsubmit="return validar();">
		
		<table width="98%" border="0" align="center">
			<tr>
				<td>&nbsp;</td>
				<td class="text1 a_right">Grado:</td>
				<td class="text1 Estilo6">
					<?php
					
					$sql = 'SELECT id_grado, nombre_seccion
						FROM secciones
						WHERE id_seccion = ' . (int) $seccion;
					$ejecutar = mysql_query($sql);

					if (!$gradoar = mysql_fetch_assoc($ejecutar))
					{
						exit;
					}
					
					$grado = $gradoar['id_grado'];

					$sql = 'SELECT *
						FROM grado
						WHERE id_grado = ' . (int) $grado;
					$ejecutar = mysql_query($sql);
					
					if (!$arreglo = mysql_fetch_assoc($ejecutar))
					{
						exit;
					}
					
					echo $arreglo['nombre'] . ' - secci&oacute;n: ' . $gradoar['nombre_seccion'];
					
					?>
					
					<input name="grado" type="hidden" id="grado" value="<?php echo $grado; ?>" />
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td class="text1 a_right">Curso:</td>
				<td class="text1 Estilo6">
					<?php
					
					$sql = 'SELECT *
						FROM cursos
						WHERE id_curso = ' . (int) $curso;
					$ejecutar = mysql_query($sql);
					
					if ($arreglo = mysql_fetch_assoc($ejecutar))
					{
						echo $arreglo['nombre_curso'];
					}
					
					?>
					<input name="curso" type="hidden" id="curso" value="<?php echo $curso; ?>" />
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td class="text1" align="right">Tiempo de Examen:</td>
				<td class="text1 Estilo6">
					<?php
					
					$sql = 'SELECT *
						FROM examenes
						WHERE id_examen = ' . (int) $examen;
					$ejecutar = mysql_query($sql);
					
					if ($arreglo = mysql_fetch_assoc($ejecutar))
					{
						echo $arreglo['examen'];
					}
					
					?>
					
					<input name="examen" type="hidden" id="examen" value="<?php echo $arreglo['id_examen']; ?>" />
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td class="text1" align="right">A&ntilde;o:</td>
				<td class="text1 Estilo6"><?php echo $anio; ?></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3" align="center"><input type="submit" name="Submit2" value="Guardar Notas" /></td>
			</tr>
		</table>
		
		<table width="98%" align="center">
			<?php
			
			$sql = 'SELECT * FROM alumno a, grado g, reinscripcion r
				WHERE r.id_grado = g.id_grado
					AND r.id_alumno = a.id_alumno
					AND g.id_grado = ' . (int) $grado . '
					AND r.id_seccion = ' . (int) $seccion . '
					AND r.anio = ' . (int) $anio . '
				ORDER BY a.apellido ASC';
			$ejecutar = mysql_query($sql) or die(mysql_error());
			
			while($arreglo = mysql_fetch_array($ejecutar))
			{
			
			?>
					
			<tr>
				<td width="139"><?php echo $arreglo['carne']; ?></td>
				<td width="395" class="text2"><img src="../images/iconos/59.ico" border="0" width="20" /> <?php echo $arreglo['apellido'] . ', ' . $arreglo['nombre_alumno']; ?></td>
				<td width="168"><?php
				
				$sql = 'SELECT *
					FROM notas
					WHERE id_alumno = ' . (int) $arreglo['id_alumno'] . '
						AND id_grado = ' . (int) $grado . '
						AND id_curso = ' . (int) $curso . '
						AND id_bimestre = ' . (int) $examen;
				$ejecutar_notas = mysql_query($sql);
				$cada_nota = mysql_fetch_array($ejecutar_notas);
				
				echo '<input name="nota[' . $arreglo['id_alumno'] . ']" value="' . (($cada_nota['nota']) ? $cada_nota['nota'] : '') . '" type="text" size="5" />';
				
				?>
				puntos</td>
			</tr>
			
			<?php
			
			}
			?>
		</table>
		<br />
		</form>
	</div>
</div>

<script type="text/javascript">
document.formulario.nota.focus();

function validar() {
	if (!confirm("Seguro que Desea Realizar esta Accion?")) {
		return false;
	}
	MM_validateForm('nota','','RinRange0:100');
	return document.MM_returnValue;
}
</script>

</body>
</html>