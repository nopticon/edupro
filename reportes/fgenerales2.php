<?php

require_once('../conexion.php');

define('XFS', '../');

$id_seccion = $_POST['seccion'];
$id_examen = $_POST['examen'];
$anio = $_POST['anio'];

$sql = 'SELECT *
	FROM secciones s, grado g
	WHERE s.id_seccion = ' . (int) $id_seccion . '
		AND s.id_grado = g.id_grado';
$ejecutar = mysql_query($sql);

$secciones = mysql_fetch_array($ejecutar);

$sql = 'SELECT *
	FROM examenes
	WHERE id_examen = ' . (int) $id_examen;
$ejecutar = mysql_query($sql);

$examenes = mysql_fetch_array($ejecutar);

//
//
//
require_once(XFS . 'pdf/pdf.php');

$pdf = new _pdf('LEGAL', 'landscape');
$pdf->cp->selectFont(XFS . 'pdf/helvetica.afm');

$page_count = 0;
$coord_sum = 0;

$str_grado = 'Grado: ' . $secciones['nombre'] . ' ' . $secciones['nombre_seccion'];
$str_examen = 'Tiempo de examen: ' . $examenes['examen'];

$pdf->text(35, $pdf->top(25), $str_grado, 12);
$pdf->text(200, $pdf->top(25, true), $str_examen, 12);

/*
$pdf->cp->line(15, $pdf->cp->cy(10), $pdf->page_width(15), $pdf->cp->cy(10));
$pdf->cp->line(15, 17, $pdf->page_width(15), 17);
$pdf->cp->line(15, $pdf->cp->cy(10), 15, 17);
$pdf->cp->line($pdf->page_width(15), $pdf->cp->cy(10), $pdf->page_width(15), 17);
*/

//$pdf->new_page();

$sql = "SELECT *
	FROM cursos
	WHERE id_grado = " . $secciones['id_grado'] . '
	ORDER BY id_curso';
$ejecutar2 = mysql_query($sql);

$ls_cursos = array();
$id_cursos = array();

$i = 0;
$table = array();

$table[] = array(
	array('text' => 'Carne', 'align' => 'center', 'width' => 75),
	array('text' => 'Alumnos', 'align' => 'center')
);

while ($cursos = mysql_fetch_assoc($ejecutar2))
{
	$i++;
	
	$table[0][] = array(
		'text' => $i,
		'align' => 'center',
		'width' => 35
	);
	
	$ls_cursos[] = array(
		'text' => $i . ' = ' . $cursos['nombre_curso'],
		'align' => 'left'
	);
	
	$id_cursos[$cursos['id_curso']] = $cursos['nombre_curso'];
}

$table[0][] = array(
	'text' => 'P',
	'align' => 'center',
	'width' => 40	
);

$sql = 'SELECT *
	FROM reinscripcion r, alumno a
	WHERE r.id_alumno = a.id_alumno
		AND r.id_grado = ' . $secciones['id_grado'] . '
		AND r.id_seccion = ' . $secciones['id_seccion'] . '
		AND r.anio = ' . $anio . '
	ORDER BY a.apellido, a.nombre_alumno';
$ejecutar = mysql_query($sql);

while ($arreglo = mysql_fetch_assoc($ejecutar))
{
	$alumno = array(
		array(
			'text' => $arreglo['carne'],
			'align' => 'left'
		),
		array(
			'text' => $arreglo['apellido'] . ', ' . $arreglo['nombre_alumno'],
			'align' => 'left'
		)
	);
	
	$numeros = array();
	foreach ($id_cursos as $id => $nombre)
	{
		$sql = 'SELECT *
			FROM notas
			WHERE id_alumno = ' . $arreglo['id_alumno'] . '
				AND id_grado = ' . $secciones['id_grado'] . '
				AND id_curso = ' . $id . '
				AND id_bimestre = ' . $id_examen;
		$ejecutar3 = mysql_query($sql) or die($sql . mysql_error());
		$notas = mysql_fetch_assoc($ejecutar3);
		
		$numeros[] = array(
			'text' => $notas['nota'],
			'align' => 'center'
		);
	}
	
	$fill = 0;
	$sum = 0;
	foreach ($numeros as $numero)
	{
		if ($numero['text'])
		{
			$fill++;
			$sum += $numero['text'];
		}
	}
	
	$text_numeros = ($fill) ? number_format(round(($sum / $fill), 2), 2) : '';
	
	$numeros[] = array(
		'text' => $text_numeros,
		'align' => 'center'
	);
	
	$table[] = array_merge($alumno, $numeros);
}

$pdf->dynamic_table($ls_cursos, 35, 30, 5, 4, 10, 0);

$pdf->multitable($table, 35, 125, 5, 10, 1, array('last_height' => $pdf->top()));

$pdf->cp->ezOutput();
$pdf->cp->stream();
die();

?>