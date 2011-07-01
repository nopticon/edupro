<?php 
require_once('../conexion.php');

$seccion = $_POST['seccion'];
$grado = $_POST['grado'];

	$insertar = "INSERT INTO secciones(id_grado, nombre_seccion) VALUES ('$grado' , '$seccion')";
	$ejecutar = mysql_query($insertar);
	
	if($ejecutar){
		header('location: index.php');
		} else {
		echo "Error al Guardar los Datos por que..." .mysql_error();
		}

?>