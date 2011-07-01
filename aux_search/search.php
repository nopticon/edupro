<?php

require_once('../conexion.php');

encabezado('Busqueda Alumno', '', false);

?>

<table width="340" border="0">
	<tr>
		<td>
			<form action="search2.php" method="get" name="formulario" id="formulario">
			
			<div class="title">Busqueda Rapida de Alumnos</div>
			
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