<?php

require_once('../../conexion.php');

$id_curso = $_POST['id_conteo'];

$curso = $_POST['curso'];
$capacidad = $_POST['capacidad'];
$status = $_POST['status'];

$modificar = "UPDATE cursos SET nombre_curso = '$curso', capacidad = '$capacidad', status = '$status' WHERE id_curso = '$id_curso' ";
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