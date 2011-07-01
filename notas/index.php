<div id="content" class="float-holder">
<?php
require_once('../conexion.php');
?>

<div id="boton1"><a href="../index.php"><img src="../images/inicio.png" border=0; /></a></div>
<div id="boton2"><img src="../images/menu.png" /></div>
<div id="boton4"><img src="../images/info.jpg" /></div>
<div id="userlog"><?php $nombre = $_SESSION['nombre'];
	echo "Bienvenido; ".$nombre; ?></div>
<div id="boton3"><a href="../exit.php"><img src="../images/exit.png" /></a></div>

	    <?php include('../menu.php'); 
		encabezado('Ingreso de Notas');?>
		<div id="content2">		
		<div class="title">Ingreso de Notas</div>
	</div>
	
	<div class="blue">
		<form action="notas.php" method="post" name="formulario" id="formulario">
		
		<table width="731" border="0" align="center">
			<tr>
				<td>&nbsp;</td>
				<td class="text1 a_right">Grado:</td>
				<td><select name="grado" id="grado">
					<?php
					
					$seleccionar = "SELECT *
						FROM grado g, secciones s
						WHERE g.id_grado = s.id_grado
							AND status = 'Alta'";
					$ejecutar = mysql_query($seleccionar);
					
					while ($arreglo = mysql_fetch_array($ejecutar))
					{
						echo '<option value="' . $arreglo['id_seccion'] . '" >' . $arreglo['nombre']. ' - secci&oacute;n: ' .$arreglo['nombre_seccion'] .'</option>';
					}
					
					?>
				</select></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td class="text1 a_right">Curso:</td>
				<td><select name="curso" id="curso">
					<?php
					
					$seleccionar = "SELECT *
						FROM cursos
						WHERE id_grado = 1";
					$ejecutar = mysql_query($seleccionar);
					
					while ($arreglo = mysql_fetch_array($ejecutar))
					{
						echo '<option value="' . $arreglo['id_curso'] . '" >' . $arreglo['nombre_curso'] . '</option>';
					}
					
					?>
				</select></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td class="text1 a_right">Tiempo de Examen:</td>
				<td><select name="examen">
					<?php
					
					$seleccionar = "SELECT * FROM examenes";
					$ejecutar = mysql_query($seleccionar);
					
					while ($arreglo = mysql_fetch_array($ejecutar))
					{
						echo '<option value="' . $arreglo['id_examen'] . '" >' . $arreglo['examen'] . '</option>';
					}
					
					?>
				</select></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td class="text1 a_right">A&ntilde;o:</td>
				<td><select name="anio">
					<?php
					
					$anioa = date('Y');
					$anio = array(2010, 2011);
					
					foreach ($anio as $row)
					{
						echo '<option value="' . $row . '"' . (($row == $anioa) ? 'selected="selected"' : '') . '>' . $row . '</option>';
					}
					
					?>
				</select></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3" align="center"><input type="submit" name="Submit2" value="Ir..." /></td>
			</tr>
		</table>
		</form>
	</div>
</div>

<script type="text/javascript">
//<![CDATA[
$(function() {
	$('#grado').change(function() {
		$.ajax({
			type: "POST",
			url: "./index2.php",
			data: "grado=" + this.value,
			success: function(msg) {
				$('#curso').html(msg);
			}
 });
	});
});
//]]>
</script>
<?php include('../menucss.php');?>
</body>
</html>