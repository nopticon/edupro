<?php

require_once("../conexion.php");

$codigo = $_POST['codigo_alumno'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$orden = $_POST['orden'];
$registro = $_POST['registro'];
$telefono1 = $_POST['telefono1'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$email = $_POST['email'];

$padre = $_POST['padre'];
$madre = $_POST['madre'];

$encargado = $_POST['encargado'];
$profesion = $_POST['profesion'];
$laborando = $_POST['labor'];
$direccion_labora = $_POST['direccion2'];
$dpi = $_POST['dpi'];
$extendido = $_POST['extendido'];

$emergencia = $_POST['emergencia'];
$telefono2 = $_POST['telefono2'];

$status ="Inscrito";

$grado = $_POST['grado'];
$seccion = $_POST['seccion'];

$fech = date("Y");
$carne = $fech . $sexo;

$insertar = "INSERT INTO alumno(carne, codigo_alumno, nombre_alumno, apellido, direccion, orden, registro, fecha, telefono1, edad, sexo, email, padre, madre, encargado, profesion, labora, direccion_labora, dpi, extendida, emergencia, telefono2, status, id_grado)
	VALUES ('$carne' , '$codigo' , '$nombre' , '$apellido' , '$direccion' , '$orden' , '$registro' , NOW() , '$telefono1' , '$edad' , '$sexo' , '$email' , '$padre' , '$madre' , '$encargado' , '$profesion' , '$laborando' , '$direccion_labora', '$dpi' , '$extendido' , '$emergencia' , '$telefono2' , 'status' , '$grado')";
$ejecutar = mysql_query($insertar);

//extrae el id
$id = mysql_insert_id($conectar);

//concatena valores para formar carne
$carne .= $id;

$insertar = "INSERT INTO reinscripcion(id_alumno, carne, id_grado, id_seccion, fecha_reinscripcion, encargado_reinscripcion, telefonos, status, anio)
	VALUES ('$id','$carne','$grado','$seccion', NOW(),'$encargado','$telefono2','$status','$fech')";
$ejecutar = mysql_query($insertar);

//hace el insert del carnet Y MODIFICA LA TABLA
$modificar = "UPDATE alumno SET carne = '$carne' WHERE id_alumno = '$id'";
$ejecutar1 = mysql_query($modificar);

if ($ejecutar)
{
	header('location: index2.php');
}
else
{
	echo 'Error al Guardar el nuevo registro de alumnos porque: ' . mysql_error();
}

?>