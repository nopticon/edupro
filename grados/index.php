<?php

require_once('../conexion.php');

encabezado('Ingreso de Grados y Secciones');

?>

<div id="content" class="float-holder">
	<div id="content2">
		<?php include('../menu.php'); ?>
		
		<div class="title">Ingreso de Grados y Secciones</div>
	</div>
	
	<div class="blue">
	<form action="cod_grado.php" method="post" name="formulario" id="formulario" onsubmit="return validar();">
	
	<table width="98%" border="0">
		<tr>
			<td width="25%" align="right" class="text1">Nombre del Grado:</td>
			<td width="75%"><input name="grado" type="text" id="grado" size="60" autocomplete="off" /></td>
		</tr>
		<tr>
			<td class="text1" align="right" class="tex1">Status:</td>
			<td>
				<select name="status" id="status">
				<option value="Alta">Alta</option>
				<option value="Baja">Baja</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="Submit2" value="Guardar" /></td>
		</tr>
	</table>
	
	</form>
	</div>
	
	<div class="title">Visualizaci&oacute;n de Grados y Secciones actuales</div>
	
	<div class="blue" style="width: 100%; height: 250px; overflow: auto;">
		<table width="100%" border="0">
			<tr>
				<td class="title" width="40%" align="center">Grado</td>
				<td class="title" width="30%" align="center">Secci&oacute;n</td>
				<td class="title" width="30%" align="center">Status</td>
			</tr>
			
			<?php
			
			$sql = "SELECT nombre, nombre_seccion, status
				FROM grado g, secciones s
				WHERE g.id_grado = s.id_grado
				ORDER BY g.id_grado, s.nombre_seccion";
			$ejecutar = mysql_query($sql);
			
			while ($arreglo = mysql_fetch_assoc($ejecutar))
			{
			?>
			<tr>
					<td><?php echo $arreglo['nombre']; ?></td>
					<td align="center"><?php echo $arreglo['nombre_seccion']; ?></td>
					<td align="center"><?php echo $arreglo['status']; ?></td>
				</tr>
			<?php
			}
			?>
		</table>
	</div>
	
</div>

<script language="JavaScript" type="text/javascript">
//<![CDATA[
document.formulario.grado.focus();

function validar(){
if(!confirm("Seguro que Desea Guardar el Grado y Seccion?")){
return false;
}
MM_validateForm('grado','','R'); return document.MM_returnValue;
}
//]]>
</script>