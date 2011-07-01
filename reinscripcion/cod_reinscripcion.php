<?php

require_once('../conexion.php');

$id_alumno = $_POST['id_alumno'];
$carne1 = $_POST['carnet'];
$id_grado = $_POST['grado'];
$id_seccion = $_POST['seccion'];
$encargado = $_POST['encargado'];
$telefonos = $_POST['telefonos'];
$observacion = $_POST['observacion'];

$status = "ReInscrito";

$anio = date("Y");

$insertar = "INSERT INTO reinscripcion(id_alumno, carne, id_grado, id_seccion, observaciones, fecha_reinscripcion, encargado_reinscripcion, telefonos, status, anio)
	VALUES ('$id_alumno' , '$carne1' , '$id_grado' , '$id_seccion' ,'$observacion' , NOW() , '$encargado' , '$telefonos' , '$status' , '$anio' )";
$ejecutar = mysql_query($insertar);

if($ejecutar)
{
	header("location: index.php");
}
else
{
	echo "Error al hacer el proceso de Re Inscripcion".mysql_error();
}

?>