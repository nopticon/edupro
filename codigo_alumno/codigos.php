<div id="content" class="float-holder">
<?php
require_once('../conexion.php');
$grado = $_REQUEST['grado'];
$seccion = $_REQUEST['seccion'];
$anio = $_REQUEST['anio'];
?>

<div id="boton1"><a href="../index.php"><img src="../images/inicio.png" border=0; /></a></div>
<div id="boton2"><img src="../images/menu.png" /></div>
<div id="boton4"><img src="../images/info.jpg" /></div>
<div id="userlog"><?php $nombre = $_SESSION['nombre'];
	echo "Bienvenido; ".$nombre; ?></div>
<div id="boton3"><a href="../exit.php"><img src="../images/exit.png" /></a></div>
	
	    <?php include('../menu.php'); 
		encabezado('Ingreso de Catedr&aacute;ticos'); ?>
		<div id="content2">
		<div class="title">Ingreso de c&oacute;digo de alumno</div>
	</div>
	
	<div class="blue">
		<form id="form1" name="form1" method="post" action="cod_act.php">
		
		<table width="98%" border="0">
			<tr>
				<td width="150">&nbsp;</td>
			  <td width="767" class="Estilo6"><br />
			    <br />
				<?php
				
				$seleccionar = "SELECT *
					FROM grado g, secciones s
					WHERE g.id_grado ='$grado'
						AND s.id_seccion = '$seccion'
						AND g.id_grado = s.id_grado";
				$ejecutar = mysql_query($seleccionar);
				
				if ($arreglo = mysql_fetch_assoc($ejecutar))
				{
					echo 'Grado: ' . $arreglo['nombre'] . ',&nbsp;&nbsp; Secci&oacute;n: '. $arreglo['nombre_seccion'];
				}
				
				?><br /><br /><br />
				</td>
				<td width="31" align="center">&nbsp;</td>
		  </tr>
		</table>
		
		<table width="98%">
			<?php 
			
			$sql = "SELECT *
				FROM alumno a, grado g, reinscripcion r
				WHERE r.id_alumno = a.id_alumno
					AND g.id_grado = r.id_grado
					AND r.id_grado = '$grado'
					AND r.id_seccion = '$seccion'
					AND r.anio = '$anio'
				ORDER BY a.apellido, a.nombre_alumno ASC ";
			$ejecutar = mysql_query($sql);
			
			$i = 0;
			while ($arreglo = mysql_fetch_assoc($ejecutar))
			{
			
			?>
			<tr>
				<td width="175" align="right"><?php echo $arreglo['carne']; ?></td>
			    <td width="218" align="center"><?php
				
				if ($arreglo['codigo_alumno'])
				{
					echo '<div>' . $arreglo['codigo_alumno'] . '</div>';
				}
				else
				{
					echo '<input name="textfield[' . $arreglo['id_alumno'] . ']" type="text" size="25" value="' . $arreglo['codigo_alumno'] . '" />';
				}
				
				?></td>
		      <td width="553"><?php echo $arreglo['apellido']; ?><?php echo " , " ?><?php echo $arreglo['nombre_alumno']; ?></td>
		  </tr>
			<?php
			
			$i++;
			}
			
			?>
			<tr>
				<td colspan="3" align="center"><input type="submit" name="Submit" value="Guardar Codigos" /></td>
			</tr>
			<tr>
				<td colspan="3">Total de alumnos: <?php echo $i; ?></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
		</table>
	  </form>
	</div>
</div>

</body>
</html>