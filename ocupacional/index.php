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
		encabezado('Asignaci&oacute;n de Areas Ocupacionales');?>
		
        <div id="content2">
		<div class="title">Asignaci&oacute;n de Areas Ocupacionales</div>
	</div>
	
	<div class="blue">
	
	<form action="../ocupacional/ocupacional.php" id="form1" name="form1" method="post">
    <br /><br /><br />
	<table width="98%" border="0">
			<tr>
				<td width="328" class="text1" align="right">Grado:
				  <select id="grado" name="grado">
                    <?php
				
				$seleccionar = "SELECT *
					FROM grado
					WHERE  id_grado = 1 AND status = 'Alta'";
				$ejecutar = mysql_query($seleccionar);
				
				while ($arreglo = mysql_fetch_array($ejecutar))
				{
					echo '<option value="' . $arreglo['id_grado'] . '" >' . $arreglo['nombre'] . '</option>';
				}
				
				?>
                  </select></td>
			  <td width="134" align="right" class="text1">Secci&oacute;n:
			    
			    <select id="seccion" name="seccion">
                  <?php
				
				$seleccionar = "SELECT *
					FROM secciones
					WHERE id_grado = 1";
				$ejecutar = mysql_query($seleccionar);
				
				while ($arreglo = mysql_fetch_array($ejecutar))
				{
					echo '<option value="' . $arreglo['id_seccion'] . '" >' . $arreglo['nombre_seccion'] . '</option>';
				}
				
				?>
                </select></td>
			  <td width="143" align="right" class="text1">A&ntilde;o:
          <select name="anio" id="anio">
                    <?php
				
				for ($i_year = date('Y'); $i_year >= 2010; $i_year--)
				{
					echo '<option value="' . $i_year . '">' . $i_year . '</option>';
				}
				
				?>
                  </select>
              </td>
			  <td width="339"><input name="submit" type="image" src="../images/buscar2.png" title="Ingreso de Codigos Estudiantiles..."  /></td>
	  </tr>
		</table>    <br /><br /><br />
	  </form>
	</div>
</div>
<?php include('../menucss.php'); ?>
</body>
</html>

<script language="JavaScript" type="text/javascript">
//<![CDATA[
document.formulario.carne.focus();

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