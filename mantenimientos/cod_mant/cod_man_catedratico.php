<?php

require_once('../../conexion.php');

$id_catedratico = $_POST['id_catedratico'];

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$profesion = $_POST['profesion'];
$email = $_POST['email'];
$telefono = $_POST['telefonos'];
$direccion = $_POST['direccion'];
$observacion = $_POST['observacion'];

$modificar = "UPDATE catedratico SET nombre_catedratico = '$nombre' , apellido = '$apellido' , profesion = '$profesion' , email = ' $email ' , telefono = '$telefono' , direccion = '$direccion' , observacion = '$observacion' WHERE id_catedratico = '$id_catedratico'";

$ejecutar = mysql_query($modificar);

if($ejecutar)
{
	header('location: ../index2.php');
}
else
{
	echo "Error al Modificar al Catedratico, por que ocurrio el siguiente error...: " .mysql_error();
}

?>
