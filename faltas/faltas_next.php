<?php

require_once('../conexion.php');

encabezado('Falta Acad&eacute;mica Guardada');

?>

<div id="content" class="float-holder">
	<div id="content2">
	    <?php include('../menu.php'); ?>
		
		<div class="title">Ingreso de Falta Académica</div>
	</div>
	
	<div class="blue" align="center">
		<br />
		<img src="../images/iconos/227.ico" width="20" valign="middle" /> Falta Acad&eacute;mica Guardada Exitosamente
		<br /><br />
		<a href="index.php">Regresar al men&uacute; principal</a>
		<br /><br />
	</div>
</div>
<?php 
$guardar = "1";

if(!empty($guardar)){
echo "alumno guardado con exito";
} 


?>
</body>
</html>