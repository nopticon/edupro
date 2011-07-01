<?php

require_once('../conexion.php');

encabezado('Busqueda Alumno', '', false);

?>

<table width="340" border="0">
	<tr>
		<td>
			<div class="title">B&uacute;squeda R&aacute;pida de Alumnos</div>
			
			<form action="search2.php" method="get" name="formulario" id="formulario">
			<table width="97%" align="center" style="background-color: #E0EBF3;">
				<tr>
					<td width="25%" align="right">Nombres:</td>
					<td width="75%"><input name="nombre" type="text" aurotomplete="off" size="29" /></td>
				</tr>
				<tr>
					<td align="right">Apellidos:</td>
					<td><input name="apellido" type="text" id="apellido" aurotomplete="off" size="29" /></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="Submit" value="Buscar" /></td>
				</tr>
			</table>
			</form>
			
			<?php
			
			$nombre = $_REQUEST['nombre'];
			$apellido = $_REQUEST['apellido'];
			
			$seleccionar = "SELECT *
				FROM alumno
				WHERE nombre_alumno LIKE '%$nombre%'
				AND apellido LIKE '%$apellido%'
				ORDER BY apellido, nombre_alumno";
			$ejecutar = mysql_query($seleccionar);
			
			?>
			
			<table width="100%" border="0">
				<?php
				
				while($arreglo = mysql_fetch_assoc($ejecutar))
				{
				
				?>
				<tr>
					<td class="Estilo4" width="65"><?php echo $arreglo['carne']; ?></td>
					<td class="text1" width="250"><a href="dato_alumno.php?id_alumno=<?php echo $arreglo['id_alumno']; ?>"><?php echo $arreglo['apellido'] . ', ' . $arreglo['nombre_alumno']; ?></a></td>
				</tr>
				<?php
				
				}
				
				?>
			</table>
		</td>
	</tr>
</table>

<script language="JavaScript" type="text/javascript">
//<![CDATA[
document.formulario.nombre.focus();
//]]>
</script>

</body>
</html>