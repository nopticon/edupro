<?php

require_once('../conexion.php');

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$profesion = $_POST['profesion'];
$email = $_POST['email'];
$telefonos = $_POST['telefonos'];
$direccion = $_POST['direccion'];
$observacion = $_POST['observacion'];

$registro = "cmemou";
$status = "Alta";

$insertar = "INSERT INTO catedratico (registro, nombre_catedratico, apellido, profesion, email, telefono, direccion, observacion, status)
	VALUES ('$registro','$nombre','$apellido','$profesion','$email','$telefonos','$direccion','$observacion','$status')";
$ejecutar = mysql_query($insertar);

if ($ejecutar)
{
	header ("location: index.php");
}
else
{
	echo "No se pudo ingresar el registro porque " . mysql_error();
}

?>