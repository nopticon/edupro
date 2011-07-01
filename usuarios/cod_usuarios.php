<?php 

require_once('../conexion.php');

$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];

	$insertar = "INSERT INTO usuarios(nombre, usuario, password, fecha) VALUES('$nombre', '$usuario' , '$password', NOW())";
	$ejecutar = mysql_query($insertar);
	
		if($ejecutar)
			{
			  header('location: index.php');
			 } else {
			 	echo("error al grabar el usuario por que...").mysql_error();
			 }

?>