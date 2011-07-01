<?php

require_once('../conexion.php');

encabezado('Ingreso de Catedr&aacute;ticos');

?>

<script type="text/JavaScript">
<!--

function validar(){
if(!confirm("Seguro que Desea Realizar esta Acción...")){
return false;
}
MM_validateForm('nombre','','R','apellido','','R','profesion','','R','email','','NisEmail','telefonos','','R','direccion','','R');return document.MM_returnValue;
}
//-->
</script>

<div id="content" class="float-holder">
	<div id="content2">
		<?php include('../menu.php'); ?>
		
		<div class="title">Ingreso de nuevo catedr&aacute;tico</div>
	</div>
	
	<div class="blue">
	<form action="cod_cate.php" method="post" name="formulario" id="formulario" onsubmit="return validar();">
	
	<table width="100%" border="0" align="center">
		<tr>
			<td width="137" class="text1 a_right">Nombres:</td>
			<td width="413"><input name="nombre" type="text" id="nombre" size="60" autocomplete="off" style="" /></td>
		</tr>
		<tr>
			<td class="text1 a_right">Apellidos:</td>
			<td><input name="apellido" type="text" id="apellido" size="60" autocomplete="off" /></td>
		</tr>
		<tr>
			<td class="text1 a_right">Profesi&oacute;n:</td>
			<td><input name="profesion" type="text" id="profesion"  autocomplete="off" size="60" /></td>
		</tr>
		<tr>
			<td class="text1 a_right">Correo Electronico:</td>
			<td><input name="email" type="text" id="email" size="60" autocomplete ="off" /></td>
		</tr>
		<tr>
			<td class="text1 a_right">Tel&eacute;fonos:</td>
			<td><input name="telefonos" type="text" id="telefonos" size="60" autocomplete="off" /></td>
		</tr>
		<tr>
			<td class="text1 a_right">Direcci&oacute;n:</td>
			<td><input name="direccion" type="text" id="direccion" size="60" autocomplete="off" /></td>
		</tr>
		<tr>
			<td class="text1 a_right">Observaci&oacute;n:</td>
			<td><textarea name="observacion" cols="60" id="observacion" autocomplete="off"></textarea></td>
		</tr>
	</table>
	
	<br /><div align="center"><input type="image" class="inone" name="submit" src="../images/save.png" title="Guardar Nuevo Alumno" /></div>
	</form>
	</div>
	
	<div class="title">Visualizaci&oacute;n de catedraticos activos</div>
	
	<div class="blue" style="width: 100%; height: 250px; overflow: auto;">
		<table width="100%" border="0">
			<tr>
				<td class="title" width="50%" align="center">Catedr&aacute;tico</td>
				<td class="title" width="15%" align="center">Profesi&oacute;n</td>
				<td class="title" width="10%" align="center">Tel&eacute;fono</td>
				<td class="title" width="25%" align="center">E-mail</td>
			</tr>
			
			<?php
			
			$sql = "SELECT *
				FROM catedratico
				ORDER BY id_catedratico DESC";
			$ejecutar = mysql_query($sql);
			
			while ($arreglo = mysql_fetch_assoc($ejecutar))
			{
			?>
			<tr>
					<td><?php echo $arreglo['apellido']; ?>, <?php echo $arreglo['nombre_catedratico']; ?></td>
					<td><?php echo $arreglo['profesion']; ?></td>
					<td><?php echo $arreglo['telefono']; ?></td>
					<td><?php echo $arreglo['email']; ?></td>
				</tr>
			<?php
			}
			?>
		</table>
	</div>
</div>

</body>
</html>