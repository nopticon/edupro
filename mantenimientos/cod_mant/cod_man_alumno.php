<?php

require_once('../../conexion.php');

$id_alumno = $_POST['id_alumno'];
$carne = $_POST['carnet'];

$codigo_alumno = $_POST['codigo_alumno'];

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];

$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];

$padre = $_POST['padre'];
$madre = $_POST['madre'];

$grado = $_POST['grado'];
$seccion = $_POST['seccion'];

$modificar = "UPDATE alumno
	SET codigo_alumno = '$codigo_alumno' , nombre_alumno = '$nombre', apellido = '$apellido', direccion = '$direccion', telefono1 = '$telefono', email = '$email', padre = '$padre', madre = '$madre', id_grado = '$grado'
	WHERE id_alumno ='$id_alumno' AND carne = '$carne'";
$ejecutar = mysql_query($modificar);

$sql = 'SELECT *
	FROM reinscripcion
	WHERE id_alumno = ' . $id_alumno . '
	ORDER BY anio DESC
	LIMIT 1';
$ejecutar_s = mysql_query($sql);

if ($result = mysql_fetch_array($ejecutar_s))
{
	$sql = 'UPDATE reinscripcion
		SET id_grado = ' . (int) $grado . ', id_seccion = ' . (int) $seccion . '
		WHERE id_alumno = ' . (int) $id_alumno . '
			AND anio = ' . $result['anio'];
	$ejecutar = mysql_query($sql);

	$sql = 'UPDATE notas
		SET id_grado = ' . (int) $grado . '
		WHERE id_alumno = ' . (int) $id_alumno . '
			AND id_grado = ' . $result['id_grado'];
	$enotas = mysql_query($sql);
}

if($ejecutar)
{
	header('location: ../../index.php');
}
else
{
	echo "Se produjo un error al modificar el archivo, por que? ".mysql_error();
}

?>