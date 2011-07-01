<?php

require_once('../conexion.php');

$nombre_ocupacion = $_POST['nombre_ocupacion'];

foreach ($nombre_ocupacion as $alumno => $codigo)
{
	if (!$codigo)
	{
		continue;
	}
	
	$sql = 'SELECT * FROM ocupacion_alumno WHERE id_alumno = ' . (int) $alumno;
	$ejecutar = mysql_query($sql);
	
	if ($arreglo = mysql_fetch_array($ejecutar))
	{
		$sql = 'UPDATE ocupacion_alumno SET id_ocupacion = ' . $codigo . '
			WHERE id_alumno = ' . (int) $alumno;
		mysql_query($sql);
	}
	else
	{
		$sql = 'INSERT INTO ocupacion_alumno (id_ocupacion, id_alumno)
			VALUES (' . $codigo . ', ' . $alumno . ')';
		mysql_query($sql);
	}
}

header('Location: index.php');
exit;

?>