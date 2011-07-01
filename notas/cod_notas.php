<?php

require_once('../conexion.php');

$curso = $_POST['curso'];
$examen = $_POST['examen'];
$grado = $_POST['grado'];
$nota = $_POST['nota'];

foreach ($nota as $alumno => $valor)
{
	$valor = (int) $valor;
	
	if (!$valor)
	{
		continue;
	}
	
	$sql = 'INSERT INTO notas (id_alumno, id_grado, id_curso, id_bimestre, nota)
		' . "VALUES ('" . $alumno . "', '" . (int) $grado . "', '" . (int) $curso . "', '" . (int) $examen . "', '" . (int) $valor . "')";
	$ejecutar = mysql_query($sql);
}

header('Location: index.php');
exit;

?>