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
		encabezado('C&oacute;digos de Alumnos');?>

		<div ="content2">
		<div class="title">Ingreso de c&oacute;digos de alumnos</div>
	</div>
	
	<div class="blue">
		<form id="form1" name="form1" method="post" action="codigos.php">
		<br /><br />	<br /><br />
		<table border="0" align="center">
			<tr>
				<td width="160"><span class="text1">Grado:
				  <select id="grado" name="grado">
                    <?php
				
				$sql = "SELECT *
					FROM grado
					WHERE id_grado = 1
						AND status = 'Alta'";
				$ejecutar = mysql_query($sql);
				
				while ($arreglo = mysql_fetch_array($ejecutar))
				{
					echo '<option value="' . $arreglo['id_grado'] . '" >' . $arreglo['nombre'] . '</option>';
				}
				
				?>
                  </select>
				</span></td>
				<td width="100" class="text1">Secci&oacute;n:
				  <select id="seccion" name="seccion">
                    <?php
				
				$sql = "SELECT *
					FROM secciones
					WHERE id_grado = 1";
				$ejecutar = mysql_query($sql);
				
				while ($arreglo = mysql_fetch_array($ejecutar))
				{
					echo '<option value="' . $arreglo['id_seccion'] . '" >' . $arreglo['nombre_seccion'] . '</option>';
				}
				
				?>
                  </select></td>
				<td width="110"><span class="text1">A&ntilde;o:
				  <select name="anio" id="anio">
                    <?php
				
				for ($i_year = date('Y'); $i_year >= 2010; $i_year--)
				{
					echo '<option value="' . $i_year . '">' . $i_year . '</option>';
				}
				
				?>
                  </select>
				</span></td>
				<td width="50"><input name="submit" type="image" src="../images/buscar2.png" title="Ingreso de Codigos Estudiantiles..."  /></td>
			</tr>
		</table>
        <br /><br />	<br /><br />
		</form>
	</div>
	
</div>

<script language="JavaScript" type="text/javascript">
//<![CDATA[
$(function() {
	$('#grado').change(function() {
		$.ajax({
			type: "POST",
			url: "../actseccion.php",
			data: "grado=" + this.value,
			success: function(msg) {
				$('#seccion').html(msg);
			}
 });
	});
});
//]]>
</script>
<?php include('../menucss.php');?>
</body>
</html>