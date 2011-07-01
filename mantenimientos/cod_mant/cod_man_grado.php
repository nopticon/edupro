<?php

require_once('../../conexion.php');

$id_conteo = $_POST['id_conteo'];

$grado = $_POST['grado'];
$seccion = $_POST['seccion'];
$status = $_POST['status'];

$modificar = "UPDATE grado SET nombre='$grado', seccion='$seccion', status='$status' WHERE id_grado = '$id_conteo' ";
$ejecutar = mysql_query($modificar);

if($ejecutar)
{
	header('location: ../index2.php');
}
else
{
	echo "Error al Intentar Modoficar el Archivo por que:" .mysql_error();
}

?>