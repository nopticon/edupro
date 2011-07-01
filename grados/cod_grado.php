<?php

require_once('../conexion.php');

$grado = $_POST['grado'];
$seccion = $_POST['seccion'];
$status = $_POST['status'];

$insertar ="INSERT INTO grado(nombre, seccion, status) VALUES ('$grado','$seccion','$status')";
$ejecutar = mysql_query($insertar);

if($ejecutar)
{
	header ("location: index.php");
}
else
{
	echo "No se pudo Guardar el Registro, por que:" .mysql_error();
}

?>