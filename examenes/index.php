<?php

require_once('../conexion.php');

encabezado('Ingreso de Tiempo para Examenes');

?>

<div id="content" class="float-holder">
	<div id="content2">
	    <?php include('../menu.php'); ?>
		
		<div class="title">Ingreso de Tiempo para Examenes</div>
	</div>
	
	<div class="blue">
		<form action="cod_examenes.php" method="post" name="formulario" id="formulario" onsubmit="return validar()">
		
		<table width="98%" border="0">
			<tr>
				<td width="10" class="text1">&nbsp;</td>
				<td width="183" align="right" class="text1">Tiempo para Examen :<br />Ej :</td>
				<td width="438"><input name="examen" type="text" id="examen" size="60" autocomplete="off" /><br />
				<span class="tex2 Estilo7"> 1er Bimestre | Primer Bimestre | 1er Trimestre | etc. </span></td>
			</tr>
			<tr>
				<td class="text1">&nbsp;</td>
				<td class="text1" align="right">Observaci&oacute;n:</td>
				<td><textarea name="observacion" cols="60" id="observacion" ></textarea></td>
			</tr>
			<tr>
				<td class="text1">&nbsp;</td>
				<td class="text1"><div align="right">Status:</div></td>
				<td>
					<select name="status" id="status">
					<option value="Alta">Alta</option>
					<option value="Baja">Baja</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="3" align="center"><input type="submit" name="Submit2" value="Guardar" /></td>
			</tr>
		</table>
		</form>
	</div>
	
	<div class="title">Visualizaci&oacute;n de Tiempos</div>
	
	<div class="blue" style="width: 100%; height: 150px; overflow: auto;">
		<table width="100%" border="0">
			<tr>
				<td class="title" width="40%" align="center">Tiempo de Examenes</td>
				<td class="title" width="30%" align="center">Fecha de ingreso</td>
				<td class="title" width="30%" align="center">Status</td>
			</tr>
			
			<?php
			
			$sql = "SELECT *
				FROM examenes
				ORDER BY id_examen DESC";
			$ejecutar = mysql_query($sql);
			
			while ($arreglo = mysql_fetch_assoc($ejecutar))
			{
			?>
			<tr>
					<td><?php echo $arreglo['examen']; ?></td>
					<td align="center"><?php echo $arreglo['fecha_ingreso']; ?></td>
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
document.formulario.examen.focus();

function validar(){
if(!confirm("Seguro que Desea Guardar el Nuevo Tiempo de Examen?")){
return false;
}
MM_validateForm('examen','','R');return document.MM_returnValue;
}
//]]>
</script>

</body>
</html>