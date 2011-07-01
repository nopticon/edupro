<?php

require('../conexion.php');

$examen = $_POST['examen'];
$observacion = $_POST['observacion'];
$status = $_POST['status'];

$ingresar = "INSERT INTO examenes(examen, observacion, status, fecha_ingreso) VALUES ('$examen','$observacion','$status', NOW())";
$ejecutar = mysql_query($ingresar);

if($ejecutar)
{
	header('location: index.php ');
}
else
{
	echo "Ocurrio un Error al Grabar el Archivo porque, " . mysql_error();
}

?>