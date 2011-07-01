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
		encabezado('Listado de Faltas Acad&eacute;micas'); ?>
		
        <div id="content2">
		<div class="title">Ver Historial de Faltas Acad&eacute;micas</div>
	</div>
	
	<div class="blue">
	<table width="98%" border="0">
	
	<?php
	
	$sql = "SELECT *
		FROM alumno a, faltas f
		WHERE a.id_alumno = f.id_alumno
		ORDER BY f.id_falta DESC LIMIT 300";
	$ejecutar = mysql_query($sql);
	
	while ($arreglo = mysql_fetch_assoc($ejecutar))
	{
	
	?>
	<tr>
	  <td width="25%" align="right" class="textred"><?php echo $arreglo['carne']; ?></td>
		<td width="50%" class="textblack"><?php echo $arreglo['apellido'] . ', ' . $arreglo['nombre_alumno']; ?></td>
		<td width="25%"><img src="../images/iconos/48.ico" /> <a href="ver_faltas.php?id_falta=<?php echo $arreglo['id_falta']; ?>" target="_blank">Ver Faltas</a></td>
	</tr>
	<?php
	
	}
	
	?>
	
	</table>
	</div>
</div>

</body>
</html>