<div id="content" class="float-holder">
<?php
require_once('../conexion.php');
$carne = $_GET['carne'];

$seleccionar = "SELECT * FROM alumno WHERE carne ='$carne'";
$ejecutar = mysql_query($seleccionar);

if(!$arreglo = mysql_fetch_assoc($ejecutar))
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
		encabezado('Ingreso de Faltas Acad&eacute;micas'); ?>
		<div id="content2">	
		<div class="title">Ingreso de Falta Académica</div>
	</div>
	
	<div class="blue">
	<form action="cod_falta.php" method="post" name="formulario" id="formulario">
	<input name="guardar" type="hidden" value="1"  />
    <input name="carne" type="hidden" value="<?php echo $arreglo['carne	']; ?>"  />
	<input name="id_alumno" type="hidden" id="id_alumno" value="<?php echo $arreglo['id_alumno']; ?>" />
	<input name="carnet" type="hidden" id="carnet" value="<?php echo $arreglo['carne']; ?>" />
	
	<table width="98%" border="0" align="center">
		<tr>
			<td width="25%" class="Estilo6">Datos Alumno:</td>
			<td width="75%">&nbsp;</td>
		</tr>
		<tr>
			<td class="text1" align="right">Carn&eacute;:</td>
			<td><?php echo $arreglo['carne']; ?></td>
		</tr>
		<tr>
			<td class="text1" align="right">Nombre:</td>
			<td><?php echo $arreglo['nombre_alumno']; ?></td>
		</tr>
		<tr>
			<td class="text1" align="right">Apellido:</td>
			<td><?php echo $arreglo['apellido']; ?></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td class="Estilo6">Datos Padres:</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td class="text1" align="right">Padre:</td>
			<td><?php echo $arreglo['padre']; ?></td>
		</tr>
		<tr>
			<td class="text1" align="right">Madre:</td>
			<td><?php echo $arreglo['madre']; ?></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td class="Estilo6">Ingresar falta:</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td class="text1" align="right">Tipo:</td>
			<td>
				<select name="tipo_falta" id="tipo_falta">
					<option value="Baja">Baja</option>
					<option value="Media">Media</option>
					<option value="Alta">Alta</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="text1" align="right">Falta Acad&eacute;mica:</td>
			<td><textarea name="falta" cols="60" id="falta"></textarea></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="Submit" value="Guardar informaci&oacute;n" /></td>
		</tr>
	</table>
	
	</form>
	</div>
</div>

<script language="JavaScript" type="text/javascript">
//<![CDATA[
document.formulario.falta.focus();
//]]>
</script>

</body>
</html>