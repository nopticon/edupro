<?php

require_once('../../conexion.php');

$id_examen = $_POST['id_examen'];

$examen = $_POST['examen'];
$observacion = $_POST['observacion'];
$status = $_POST['status'];

$modificar = "UPDATE examenes SET examen = '$examen' , observacion = '$observacion' , status = '$status' WHERE id_examen = '$id_examen'";
$ejecutar = mysql_query($modificar);

if($ejecutar)
{
	header('location: ../index2.php');
}
else
{
	echo "Ocurrio un Error al Modificar el Archivo, por que? ".mysql_error();
}

?>