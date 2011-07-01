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
		encabezado('Modulo de Historial del Alumno'); ?>

		<div id="content2">		
		<div class="title">Modulo de Historial del Alumno</div>
	</div>
	
	<div class="blue">
	<form action="historial.php" method="post" name="formulario" id="formulario">
	<br /><br /><br />
	<table width="100%" border="0" align="center">
		<tr>
			<td class="text1" width="34%" align="right">Carn&eacute;:</td>
		    <td class="text1" width="15%"><input name="carne" type="text" id="textred" aurotomplete="off" size="20"  autocomplete="off" /></td>
	      <td class="text1" width="51%"><input name="submit" type="image" src="../images/buscar2.png" title="Buscar por carn�..."  />          </td>
	  </tr>
		
	</table>
		<br /><br /><br />
	</form>
	</div>
</div>

<script language="JavaScript" type="text/javascript">
//<![CDATA[
document.formulario.carne.focus();
//]]>
</script>
<?php include('../menucss.php'); ?>
</body>
</html>