<?php

require_once('../conexion.php');

encabezado('Ingreso de Cursos para Grado');

?>

<div id="content" class="float-holder">
	<div id="content2">
	    <?php include('../menu.php'); ?>
		
		<div class="title">Ingreso de Cursos para Grado</div>
	</div>
	
	<div class="blue">
		<form action="cod_cursos.php" method="post" name="formulario" id="formulario" onsubmit="return validar();">
		
		<table width="98%" border="0" align="center">
			<tr>
				<td class="Estilo6">&Aacute;reas:</td>
				<td><select name = "areas_cursos">
				<?php
				
				$seleccionar = "SELECT * FROM areas_cursos";
				$ejecutar = mysql_query($seleccionar);
				
				while ($arreglo = mysql_fetch_array($ejecutar))
				{
					echo '<option value="' . $arreglo['id_area'] . '" >' . $arreglo['nombre_area'] . '</option>';
				}
				
				?>
				</select></td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td width="137" class="Estilo6">Datos Sub &aacute;reas: </td>
				<td width="316">&nbsp;</td>
			</tr>
			<tr>
				<td class="text1"><div align="right">Nombre del Curso :</div></td>
				<td><input name="curso" type="text" id="curso" aurotomplete="off" size="60"  autocomplete="off" /></td>
			</tr>
			<tr>
				<td class="text1"><div align="right">Capacidad: </div></td>
				<td><input name="capacidad" type="text" class="text2" id="capacidad" size="10"  autocomplete="off" /> Alumnos</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td class="Estilo6">Relacionar al grado: </td>
				<td><select name="grado">
				<?php
				
				$seleccionar = "SELECT *
					FROM grado
					WHERE status = 'Alta'";
				$ejecutar = mysql_query($seleccionar);
				
				while ($arreglo = mysql_fetch_array($ejecutar))
				{
					echo '<option value="' . $arreglo['id_grado'] . '" >' . $arreglo['nombre'],$arreglo['seccion'] . '</option>';
				}
				
				?></select>
				</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td class="Estilo6">Impartido por catedr&aacute;tico: </td>
				<td><select name="catedratico">
				<?php
				
				$seleccionar = "SELECT *
					FROM catedratico";
				$ejecutar = mysql_query($seleccionar);
				
				while ($arreglo = mysql_fetch_array($ejecutar))
				{
					echo '<option value="'.$arreglo['id_catedratico'].'" >' . $arreglo['nombre_catedratico'] . ' ' . $arreglo['apellido'] . '</option>';
				}
				
				?>
				</select></td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="Submit2" value="Guardar" /></td>
			</tr>
		</table>
		
		<div class="title">Relaci&oacute;n de Cursos - Grados - Profesores</div>
		
		<div class="blue" style="width: 100%; height: 250px; overflow: auto;">
			<table width="100%" border="0">
				<tr>
					<td class="title" width="45%" align="center">Curso</td>
					<td class="title" width="15%" align="center">Grado</td>
					<td class="title" width="10%" align="center">Capacidad</td>
					<td class="title" width="30%" align="center">Catedr&aacute;tico</td>
				</tr>
			<?php
			
			$seleccionar = "SELECT *
				FROM cursos c, grado g, catedratico x
				WHERE c.id_grado = g.id_grado
					AND x.id_catedratico = c.id_catedratico
					AND g.status = 'Alta'
				ORDER BY c.id_grado";
			$ejecutar = mysql_query($seleccionar);

			while ($arreglo = mysql_fetch_assoc($ejecutar))
			{
			?>
				<tr>
					<td><?php echo $arreglo['nombre_curso'];?></td>
					<td align="center"><?php echo $arreglo['nombre'] . ' ' . $arreglo['seccion']; ?></td>
					<td align="center"><?php echo $arreglo['capacidad']; ?></td>
					<td><?php echo $arreglo['nombre_catedratico'] . ' ' . $arreglo['apellido']; ?></td>
				</tr>
			<?php
			}
			?>
			</table>
		</div>
		</form>
	</div>
</div>
		
</body>
</html>

<script language="JavaScript" type="text/javascript">
//<![CDATA[
document.formulario.curso.focus();

function alerta(){
return window.confirm("¿Seguro que desea Realizar la Acción...?");}
//]]>
</script>