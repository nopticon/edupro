<?php 
require_once('../conexion.php');

$area = $_POST['area'];
$observacion = $_POST['observacion'];

$insertar = "INSERT INTO areas_cursos (nombre_area, observacion_area)
	VALUES ('$area' , '$observacion')";
$ejecutar = mysql_query($insertar);

if ($ejecutar)
{
	header ('location: index.php');
}
else
{
	echo "Error al guardar el registro, porque " . mysql_error();
}

?>