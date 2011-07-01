<?php

require_once('../conexion.php');

$id_alumno = $_GET['id_alumno'];

$seleccionar = 'SELECT *
	FROM alumno
	WHERE id_alumno = ' . (int) $id_alumno;
$ejecutar = mysql_query($seleccionar);

if (!$arreglo = mysql_fetch_assoc($ejecutar))
{
	exit;
}

encabezado('Busqueda Alumno', '', false);

?>

<table width="340" border="0">
	<tr>
		<td align="right"><img src="../images/iconos/73.ico" /> <a href="search.php">Regresar a B&uacute;squeda</a></td>
	</tr>
	<tr>
		<td>
			<form action="search2.php" method="get" name="formulario" id="formulario">
			
			<div class="title">Datos Generales del Alumno</div>
			
			<table width="97%" align="center" style="background-color: #E0EBF3;">
				<tr>
					<td width="35%" align="right">C&oacute;digo Alumno:</td>
					<td width="65%"><?php echo $arreglo['codigo_alumno'];?></td>
				</tr>
				<tr>
					<td align="right">Carn&eacute;:</td>
					<td><?php echo $arreglo['carne']; ?></td>
				</tr>
				<tr>
					<td align="right">Nombre:</td>
					<td><?php echo $arreglo['nombre_alumno']; ?></td>
				</tr>
				<tr>
					<td align="right">Apellido:</td>
					<td><?php echo $arreglo['apellido']; ?></td>
				</tr>
				<tr>
					<td align="right">Direcci&oacute;n:</td>
					<td><?php echo $arreglo['direccion']; ?></td>
				</tr>
				<tr>
					<td align="right">Tel&eacute;fono:</td>
					<td><?php echo $arreglo['telefono1']; ?></td>
				</tr>
				<tr>
					<td align="right">E-Mail:</div></td>
					<td><?php echo $arreglo['email']; ?></td>
				</tr>
				<tr>
					<td><div align="right">Padre:</div></td>
					<td><?php echo $arreglo['padre']; ?></td>
				</tr>
				<tr>
					<td><div align="right">Madre:</div></td>
					<td><?php echo $arreglo['madre']; ?></td>
				</tr>
			</table>
			
			</form>
		</td>
	</tr>
</table>

</body>
</html>