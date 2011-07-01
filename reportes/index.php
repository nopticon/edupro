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
		encabezado('Reportes del Sistema');?>
		<div id="content2">
		<div class="title">Reportes del Sistema</div>
	</div>
	
	<div class="blue">
	
	<ul class="options">
		<li><a href="alumnos/listado_alumno.php"><img src="../images/iconos/59.ico" width="20" valign="middle" /> Listado de Alumnos</a></li>
		<li><a href="asistencia/listado_alumno.php"><img src="../images/iconos/152.ico" width="20" valign="middle" /> Control Asistencia de Alumnos</a></li>
		<li><a href="promedios/"><img src="../images/iconos/227.ico" width="20" valign="middle" /> Promedios de Alumnos</a></li>
		<li><a href="calificaciones.php"><img src="../images/iconos/30.ico" width="20" valign="middle" /> Tarjeta de Calificaciones</a></li>
		<li><a href="catedraticos/listado_catedratico.php"><img src="../images/iconos/209.ico" width="20" valign="middle" /> Catedr&aacute;ticos con Cursos</a></li>
		<li><a href="certificaciones.php"><img src="../images/iconos/144.ico" width="20" valign="middle" /> Certificaciones Anuales</a></li>
		<li><a href="fgenerales.php"><img src="../images/iconos/buddy-signon.ico" width="20" valign="middle" /> Cuadros Generales de Calificaciones</a></li>
		<li><a href="carta_editar.php" target="_blank"><img src="../images/iconos/22.ico" width="20" valign="middle" /> Carta para Edici&oacute;n de Calificaci&oacute;n</a></li>
	</ul>
	<br /><br />
    

	  
	</div>
</div>
<?php include('../menucss.php'); ?>
</body>
</html>