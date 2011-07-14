<?php

require_once('../conexion.php');
define('XFS', '../');

require_once(XFS . 'pdf/pdf.php');

$pdf = new _pdf();
$pdf->cp->selectFont(XFS . 'pdf/helvetica.afm');

$page_count = 0;
$coord_sum = 0;

$id_seccion = $_POST['seccion'];
$anio = $_POST['anio'];

$sql = 'SELECT *
	FROM secciones s, grado g
	WHERE s.id_seccion = ' . (int) $id_seccion . '
		AND s.id_grado = g.id_grado';
$ejecutar = mysql_query($sql);

$secciones = mysql_fetch_array($ejecutar);

$sql = 'SELECT *
	FROM reinscripcion r, secciones s, grado g, alumno a
	WHERE r.id_grado = ' . $secciones['id_grado'] . '
		AND r.id_seccion = ' . $secciones['id_seccion'] . '
		AND r.anio = ' . $anio . '
		AND r.id_seccion = s.id_seccion
		AND r.id_alumno = a.id_alumno
		AND r.id_grado = g.id_grado';
$ejecutar = mysql_query($sql);

$i = 0;
while ($arreglo = mysql_fetch_assoc($ejecutar))
{
	if ($i) $pdf->new_page();
	
	$pdf->cp->addJpegFromFile('../images/logo.jpg', 40, $pdf->cp->cy(80), 60);
	
	$pdf->text(100, $pdf->top(25), 'INSTITUTO NACIONAL DE EDUCACION BASICA', 8, 'center', $pdf->page_width(125));
	$pdf->text(100, $pdf->top(11), 'ESCUELA NORMAL RURAL No. 5', 8, 'center', $pdf->page_width(125));
	$pdf->text(100, $pdf->top(11), '&quot;Prof. Julio Edmundo Rosado Pinelo&quot;', 8, 'center', $pdf->page_width(125));
	$pdf->text(100, $pdf->top(11), 'Santa Elena, Flores, Pet&eacute;n. Tel. 79262393', 8, 'center', $pdf->page_width(125));
	$pdf->text(100, $pdf->top(11), '&quot;SIMIENTE DE CULTURA EN PET&Eacute;N&quot;', 8, 'center', $pdf->page_width(125));
	$pdf->text(100, $pdf->top(20), 'FICHA DE RENDIMIENTO ESCOLAR', 11, 'center', $pdf->page_width(125));
	
	$datos = array(
		array(
			array('text' => 'Carn&eacute;:', 'align' => 'right'),
			array('text' => $arreglo['carne'], 'align' => 'left'),
			array('text' => 'Fecha:', 'align' => 'right'),
			array('text' => $arreglo['fecha'], 'align' => 'left'),
		),
		array(
			array('text' => 'Nombres y Apellidos:', 'align' => 'right'),
			array('text' => $arreglo['nombre_alumno'] . ', ' . $arreglo['apellido'], 'align' => 'left'),
			array('text' => 'Telefono:', 'align' => 'right'),
			array('text' => $arreglo['telefono1'], 'align' => 'left'),
		),
		array(
			array('text' => 'Email:', 'align' => 'right'),
			array('text' => $arreglo['email'], 'align' => 'left'),
			array('text' => 'C&oacute;digo:', 'align' => 'right'),
			array('text' => $arreglo['codigo_alumno'], 'align' => 'left'),
		),
		array(
			array('text' => 'Grado:', 'align' => 'right'),
			array('text' => $arreglo['nombre'] . ' ' . $arreglo['nombre_seccion'], 'align' => 'left'),
			array('text' => '', 'align' => 'right'),
			array('text' => '', 'align' => 'left'),
		),
		array(
			array('text' => 'Encargado:', 'align' => 'right'),
			array('text' => $arreglo['encargado_reinscripcion'], 'align' => 'left'),
			array('text' => '', 'align' => 'right'),
			array('text' => '', 'align' => 'left'),
		)
	);
	
	$pdf->multitable($datos, 35, $pdf->top(15), 5, 9, 0);
	
	$infot = array(
		array(array('text' => 'Curso', 'align' => 'center'))
	);
	
	$sql = 'SELECT *
		FROM examenes
		WHERE examen NOT LIKE \'%Recup%\'
		ORDER BY id_examen';
	$ejecutar2 = mysql_query($sql);
	
	while ($row = mysql_fetch_array($ejecutar2))
	{
		$infot[0][] = array('text' => $row['examen'], 'align' => 'center', 'width' => 75);
	}
	
	$infot[0][] = array('text' => 'Prom', 'align' => 'center', 'width' => '50');
	
	$sql = "SELECT *
		FROM cursos c, reinscripcion r
		WHERE r.id_grado = " . $secciones['id_grado'] . '
			AND r.id_seccion = ' . $secciones['id_seccion'] . '
			AND r.anio = ' . $anio . '
			AND r.id_grado = c.id_grado
			AND r.id_alumno = ' . (int) $arreglo['id_alumno'];
	$ejecutar2 = mysql_query($sql);
	
	$note_sum = array();
	$note_quant = array();
	$j = 1;
	
	while($arreglo2 = mysql_fetch_assoc($ejecutar2))
	{
		$infot[$j] = array(array('text' => $arreglo2['nombre_curso'], 'align' => 'left'));
		
		$sql = 'SELECT *
			FROM examenes
			WHERE examen NOT LIKE \'%Recup%\'
			ORDER BY id_examen';
		$ejecutar3 = mysql_query($sql);
		
		$note_each = 0;
		$note_each_f = 0;
		
		$total_examenes = 0;
		while ($row = mysql_fetch_array($ejecutar3))
		{
			$sql = 'SELECT *
				FROM notas
				WHERE id_alumno = ' . $arreglo['id_alumno'] . '
					AND id_grado = ' . $arreglo['id_grado'] . '
					AND id_curso = ' . $arreglo2['id_curso'] . '
					AND id_bimestre = ' . $row['id_examen'];
			$ejecutar4 = mysql_query($sql);
			$notas = mysql_fetch_assoc($ejecutar4);
			
			$infot[$j][] = array('text' => $notas['nota'], 'align' => 'center');
			$total_examenes++;
			
			if ($notas['nota'])
			{
				if (!isset($note_sum[$row['id_examen']]))
				{
					$note_sum[$row['id_examen']] = 0;
				}
				
				if (!isset($note_quant[$row['id_examen']]))
				{
					$note_quant[$row['id_examen']] = 0;
				}
				
				$note_sum[$row['id_examen']] += $notas['nota'];
				$note_quant[$row['id_examen']]++;
				
				$note_each_f++;
				$note_each += $notas['nota'];
			}
		}
		
		if (!$note_each_f) $note_each_f = 1;
		
		$infot[$j][] = array('text' => round($note_each / $note_each_f), 'align' => 'center');
		
		$j++;
	}
	
	$infot[$j] = array(array('text' => 'Promedio', 'align' => 'right'));
	
	foreach ($note_sum as $note_id => $note_each)
	{
		$infot[$j][] = array('text' => number_format(($note_each / $note_quant[$note_id]), 2), 'align' => 'center');
	}
	
	for ($i = 0; $i < ($total_examenes - count($note_sum)); $i++)
	{
		$infot[$j][] = array('text' => '', 'align' => 'center');
	}
	$infot[$j][] = array('text' => '', 'align' => 'center');
	
	$pdf->multitable($infot, 35, $pdf->top(25), 5, 9, 1, array('last_height' => $pdf->top()));
	
	$pdf->text(35, $pdf->top(20), 'Observaciones:', 8);
	$pdf->text(35, $pdf->top(10), 'De 0 a 59 puntos, reprobado.', 7);
	$pdf->text(35, $pdf->top(10), 'De 60 a 100 puntos, aprobado.', 7);

	$sql = 'SELECT *
		FROM faltas
		WHERE id_alumno = ' . (int) $arreglo['id_alumno'] . '
		ORDER BY fecha_falta DESC
		LIMIT 3';
	$ejecutar6 = mysql_query($sql);
	
	$pdf->text(30, $pdf->top(5), '', 5);
	
	$i2 = 0;
	while ($row = mysql_fetch_array($ejecutar6))
	{
		if (!$i2)
		{
			$pdf->text(35, $pdf->top(15), 'Faltas acad&eacute;micas:', 9);
		}
		
		$pdf->text(35, $pdf->top(10), $row['falta'], 7);
		$i2++;
	}

	$pdf->text(100, $pdf->top(25), 'Vo. Bo.', 9);
	$pdf->text(100, $pdf->top(15), 'DIRECTOR', 9);
	
	$line_top = $pdf->cp->cy($pdf->top(15));
	$pdf->cp->line(35, $line_top, $pdf->page_width(35), $line_top);
	
	$pdf->text(35, $pdf->top(20), 'Se&ntilde;or Director:', 9);
	
	$pdf->text(35, $pdf->top(15), 'Yo '. $arreglo['encargado_reinscripcion'] .' por este medio hago constar que he quedado enterado de las calificaciones de mi hijo(a):', 9);
	$pdf->text(35, $pdf->top(15), $arreglo['nombre_alumno'] . ' ' . $arreglo['apellido'].' que cursa el '. $secciones['nombre'].', seccion: '. $secciones['nombre_seccion'].'.', 9);
	
	$pdf->text(50, $pdf->top(25), '(f) _____________________________________________', 9);
	$pdf->text(50, $pdf->top(15), 'Padre de familia o Encargado', 9);
	$pdf->text(50, $pdf->top(15), 'Fecha de impresi&oacute;n: '. date('d m Y'), 9);
	
	$i++;
}

$pdf->cp->ezOutput();
$pdf->cp->stream();
exit;

?>