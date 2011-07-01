<?php

require_once('../conexion.php');

encabezado('Ingreso de &Aacute;reas');

?>

<script type="text/javascript">
//<![CDATA[
function validar() {
	if (!confirm("Seguro que desea guardar la nueva area..."))
	{
		return false;
	}
	MM_validateForm('area','','R','observacion','','R');return document.MM_returnValue;
}
//]]>
</script>

<div id="content" class="float-holder">
	<div id="content2">
		<?php include('../menu.php'); ?>
		
		<div class="title">Ingreso de &Aacute;reas</div>
	</div>
	
	<div class="blue">
		
		<form action="cod_area.php" method="post" onsubmit="return validar();">
			<table width="100%" border="0">
				<tr>
					<td width="10" class="text1">&nbsp;</td>
					<td width="183" align="right" class="text1">Nombre del &Aacute;rea:</td>
					<td width="438"><input name="area" type="text" id="area" size="60" autocomplete="off"  /></td>
				</tr>
				<tr>
					<td class="text1">&nbsp;</td>
					<td class="text1" align="right">Observaci&oacute;n:</td>
					<td><textarea name="observacion" id="observacion" autocomplete="off"></textarea></td>
				</tr>
				<tr>
					<td colspan="3" align="center"><input type="submit" name="Submit2" value="Guardar" /></td>
				</tr>
			</table>
		</form>
		
		<div class="title">&Aacute;reas Actuales</div>
		
		<div align="center">
		<?php
		
		$seleccionar = "SELECT * FROM areas_cursos";
		$ejecutar = mysql_query($seleccionar);
		
		while($arreglo = mysql_fetch_assoc($ejecutar))
		{
		?>
			<table width="100%" border="0">
				<tr>
					<td width="25%" align="right"><img src="../images/iconos/227.ico" width="16" /></td>
					<td width="75%" align="left"><?php echo $arreglo['nombre_area']; ?></td>
				</tr>
			</table>
		<?php
		}
		?>
		</div>
	</form>
		
	</div>
</div>

</body>
</html>