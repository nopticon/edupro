<div id="content" class="float-holder">
<?php
require_once('../conexion.php');
$carne = $_REQUEST['carne'];
$seleccionar = "SELECT *
	FROM alumno
	WHERE carne ='$carne'";
$ejecutar = mysql_query($seleccionar);

if (!$arreglo = mysql_fetch_assoc($ejecutar))
{
	header('location: index.php');
}
?>
<div id="boton1"><a href="../index.php"><img src="../images/inicio.png" border=0; /></a></div>
<div id="boton2"><img src="../images/menu.png" /></div>
<div id="boton4"><img src="../images/info.jpg" /></div>
<div id="userlog"><?php $nombre = $_SESSION['nombre'];
	echo "Bienvenido; ".$nombre; ?></div>
<div id="boton3"><a href="../exit.php"><img src="../images/exit.png" /></a></div>


		<?php include('../menu.php');
		encabezado('Historial de Alumno'); ?>
	<div id="content2">		
		<div class="title">Historial de Alumno</div>
	</div>
	
	<div class="blue">
	
	<table width="74%" border="0" align="center">
<tr>
			<td width="15%" class="textred" aling="right">Datos Alumno:</td>
			<td width="32%">&nbsp;</td>
			<td width="20%"><div align="right"><span class="textred">Datos Padres:</span></div></td>
			<td width="33%">&nbsp;</td>
		</tr>
		<tr>
			<td class="text1" align="right">Carn&eacute;:</td>
			<td class="textblack"><?php echo $arreglo['carne']; ?></td>
			<td class="text1"><div align="right">Padre:</div></td>
			<td class="textblack"><?php echo $arreglo['padre']; ?></td>
		</tr>
		<tr>
			<td class="text1" align="right">Nombre:</td>
			<td class="textblack"><?php echo $arreglo['nombre_alumno']; ?></td>
			<td class="text1"><div align="right">Madre:</div></td>
			<td class="textblack"><?php echo $arreglo['madre']; ?></td>
		</tr>
		<tr>
			<td class="text1" align="right">Apellido:</td>
			<td class="textblack"><?php echo $arreglo['apellido']; ?></td>
			<td class="textblack">&nbsp;</td>
			<td class="textblack">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
		</tr>
	</table>
	
  </div>
	
	<div class="titlered">Historial de Grados</div>
	
	<div class="blue" style="width: 99%; margin: 0 auto;">
		<table width="100%" border="0">
			<tr>
				<td class="textred" width="10%" align="center">A&ntilde;o</td>
			  <td class="textred" width="22%" align="center">Grado</td>
			  <td class="textred" width="31%">Encargado</td>
				<td class="textred" width="11%" align="left">Constancias</td>
				<td class="textred" width="4%" align="center">Notas</td>
				<td class="textred" width="22%" align="center">Certificado</td>
			</tr>
			
			<?php
			
			$sql = "SELECT *
				FROM reinscripcion r, alumno a, grado g, secciones s
				WHERE r.id_alumno = a.id_alumno
					AND r.id_grado = g.id_grado
					AND s.id_seccion = r.id_seccion
					AND s.id_grado = r.id_grado
					AND r.carne = '$carne'";
			$ejecutar = mysql_query($sql);
			
			while ($arreglo = mysql_fetch_assoc($ejecutar))
			{
			?>
			<tr>
				<td align="center" class="textblack"><?php echo $arreglo['anio']; ?></td>
				<td class="textblack"><?php echo $arreglo['nombre'] . ', secci&oacute;n: ' . $arreglo['nombre_seccion']; ?></td>
				<td class="textblack"><?php echo $arreglo['encargado_reinscripcion']; ?></td>
				<td align="center">
                <a href="../reportes/compromiso.php?id_alumno=<?php echo $arreglo['id_alumno']; ?>&amp;id_grado=<?php echo $arreglo['id_grado'];?>" target="_blank"><img src="../images/printer.png" width="25" border="0" /></a> 
                <a href="../reportes/compromiso2.php?id_alumno=<?php echo $arreglo['id_alumno']; ?>&amp;id_grado=<?php echo $arreglo['id_grado']; ?>" target="_blank"><img src="../images/printer.png" width="25" border="0" />                </td>
				<td align="center"><a href="../reportes/grado.php?id_alumno=<?php echo $arreglo['id_alumno']; ?>&amp;id_grado=<?php echo $arreglo['id_grado']; ?> " target="_blank"><img src="../images/lista2.png" width="28" border="0" /></a></td>
				<td align="center">
					<form action="../reportes/certificaciones2.php" method="post" target="_blank">
						<input type="hidden" name="alumno" value="<?php echo $arreglo['id_alumno']; ?>" />
						<input type="hidden" name="anio" value="<?php echo $arreglo['anio']; ?>" />
						<input type="hidden" name="seccion" value="<?php echo $arreglo['id_seccion']; ?>" />
					  <input name="submit" type="image" src="../images/certificado.png" title="Buscar por carn&eacute;..."  />
				  </form>				</td>
			</tr>
			<?php
			}
			?>
		</table>
  </div>
	
</div>
<?php include('../menucss.php');?>
</body>
</html>