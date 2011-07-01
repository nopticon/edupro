<?php 

require_once('../conexion.php');

$area = $_POST['area'];
$observacion = $_POST['observacion'];

$insertar = "INSERT INTO area_ocupacional (nombre_ocupacion, observacion) VALUES ('$area' , '$observacion')";
$ejecutar = mysql_query($insertar);

if ($ejecutar)
{
	header('Location: index.php');
}
else
{
	echo "Se produjo un error, por que " . mysql_error();
}

?>