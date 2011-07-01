<?php

require_once('../conexion.php');

$textfield = $_POST['textfield'];

foreach ($textfield as $alumno => $codigo)
{
	if (!$codigo)
	{
		continue;
	}
	
	$sql = "UPDATE alumno SET codigo_alumno = '" . $codigo . "' WHERE id_alumno = " . (int) $alumno;
	$ejecutar = mysql_query($sql);
}

header('Location: index.php');
exit;

?>