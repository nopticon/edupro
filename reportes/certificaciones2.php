<?php

require_once('../conexion.php');
define('XFS', '../');

require_once(XFS . 'pdf/pdf.php');
require_once(XFS . 'pdf/convert.php');

$cv = new convert();

$pdf = new _pdf('LEGAL');
$pdf->cp->selectFont(XFS . 'pdf/helvetica.afm');

$page_count = 0;
$coord_sum = 0;

$id_seccion = $_POST['seccion'];
$alumno = (isset($_POST) && isset($_POST['alumno'])) ? $_POST['alumno'] : 0;
$anio = $_POST['anio'];

$sql = 'SELECT *
	FROM secciones s, grado g
	WHERE s.id_seccion = ' . (int) $id_seccion . '
		AND s.id_grado = g.id_grado';
$ejecutar = mysql_query($sql);

$secciones = mysql_fetch_array($ejecutar);

$seleccionar = 'SELECT * FROM reinscripcion r, secciones s, grado g, alumno a
	WHERE r.id_grado = ' . $secciones['id_grado'] . '
		AND r.id_seccion = ' . $secciones['id_seccion'] . '
		AND r.anio = ' . (int) $anio . '
		AND r.id_seccion = s.id_seccion
		AND r.id_alumno = a.id_alumno
		AND r.id_grado = g.id_grado';

if ($alumno)
{
	$a_seleccionar = "SELECT id_alumno, nombre_alumno, apellido
		FROM alumno
		WHERE id_alumno = '" . (int) $alumno . "'";
	$a_ejecutar = mysql_query($a_seleccionar);
	
	if ($a_alumno = mysql_fetch_array($a_ejecutar))
	{
		$seleccionar .= ' AND a.id_alumno = ' . (int) $alumno;
	}
}

$ejecutar = mysql_query($seleccionar);

$i = 0;
while ($arreglo = mysql_fetch_assoc($ejecutar))
{
	if ($i) $pdf->new_page();
	
	$pdf->cp->addJpegFromFile('../images/logo-cert.jpg', 65, $pdf->cp->cy(125), 400); 
	
	$grado = ucfirst(strtolower(implode(' ', array_splice(explode(' ', $arreglo['nombre']), 0, 1))));
	$firma1 = '';
	$firma2 = '';
	
	switch ($arreglo['id_grado'])
	{
		case 1:
			$firma1 = 'Candida Rosa Flores Alvarado';
			$firma2 = 'Oficinista II';
			$inicio = 'La infrascrita';
			 break;
		case 2:
			$firma1 = 'Azar&iacute;as Isa&iacute; Hoil Franco';
			$firma2 = 'Oficinista II';
			$inicio = 'El infrascrito';
			break;
		case 3:
		case 4:
			$firma1 = 'Gladys Marieta S&aacute;nchez Deluca';
			$firma2 = 'Oficinista II';
			$inicio = 'La infrascrita';
			break;
	}
	
	$text_block = ''. $inicio .' Oficinista II, del Instituto Nacional de Educaci&oacute;n B&aacute;sica, Adscrito a la Escuela Normal Rural No. 5 &quot;Prof. Julio Edmundo Rosado Pinelo&quot; de Santa Elena, Pet&eacute;n. Acuerdo Ministerial No. 994 del 10/07/85.';
	
	$text_block2 = 'CERTIFICA: Que el alumno (a): ' . $arreglo['nombre_alumno'] . ' ' . $arreglo['apellido'];
	$text_block4 = 'Durante el Ciclo Escolar ' . $anio . ' curs&oacute; el ' . $grado . ' Grado de Cultura General B&aacute;sica, con C&oacute;digo Personal No. ' . $arreglo['codigo_alumno'] . '. Extendido por el Ministerio de Educaci&oacute;n en la ciudad de Guatemala, y que ha tenido a la vista los Cuadros de Registro de Evaluaci&oacute;n en donde aparece que se hizo acreedor(a) a las notas siguientes:';

	$pdf->text_wrap($text_block, 11, $pdf->page_width() - 140, 65, $pdf->top(150), 20, 'full', false, 40);
	$pdf->text_wrap($text_block2, 11, $pdf->page_width() - 140, 65, $pdf->top(65), 20);
	$pdf->text_wrap($text_block4, 11, $pdf->page_width() - 140, 65, $pdf->top(25), 20, 'full', false, 40);
	
	$_areas = array();
	$infot = array(array(array('text' => 'No.', 'align' => 'center', 'width' => 30)));
	
	switch ($arreglo['id_grado'])
	{
		case 3:
			break;
		default:
			$infot[0][] = array('text' => 'Areas', 'align' => 'center', 'width' => 105);
			break;
	}
	
	$infot[0][] = array('text' => 'Curso', 'align' => 'center');
	$infot[0][] = array('text' => 'No.', 'align' => 'center', 'width' => 30);
	$infot[0][] = array('text' => 'Nota en letras', 'align' => 'center');
	$infot[0][] = array('text' => 'Resultado', 'align' => 'center', 'width' => 75);
	
	$sql = "SELECT *
		FROM cursos c, areas_cursos ac, reinscripcion r
		WHERE r.id_grado = " . $secciones['id_grado'] . '
			AND r.id_seccion = ' . $secciones['id_seccion'] . '
			AND r.anio = ' . $anio . '
			AND r.id_grado = c.id_grado
			AND r.id_alumno = ' . (int) $arreglo['id_alumno'] . '
			AND c.id_area = ac.id_area';
	$ejecutar2 = mysql_query($sql);
	
	$sql11 = 'SELECT *
		FROM area_ocupacional a, ocupacion_alumno oc
		WHERE a.id_ocupacion = oc.id_ocupacion
			AND oc.id_alumno = ' . $arreglo['id_alumno'];
	$ejecutar_oc = mysql_query($sql11);
	
	$roc = mysql_fetch_array($ejecutar_oc);
	
	$j = 1;
	while($arreglo2 = mysql_fetch_assoc($ejecutar2))
	{
		$sql = 'SELECT *
			FROM examenes
			WHERE examen NOT LIKE \'%Recup%\'
			ORDER BY id_examen';
		$ejecutar3 = mysql_query($sql);
		
		$per_curse = 0;
		$per_curse_f = 0;
		
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
			
			if (!isset($notas['nota'])) $notas['nota'] = 0;
			if (!isset($notas['nota2'])) $notas['nota2'] = 0;
			
			$total = $notas['nota'] + $notas['nota2'];
			
			$per_curse += $total;
			
			if ($total) $per_curse_f++;
		}
		
		if (!$per_curse_f) $per_curse_f = 1;
		
		$per_sum = number_format($per_curse / $per_curse_f, 0);
		
		$resultado = ($per_sum >= 60) ? 'Aprobado' : 'No aprobado';
		
		if ($per_sum)
		{
			$lets = ucfirst($cv->cv($per_sum));
		}
		else
		{
			$resultado = '';
			$lets = '';
		}
		
		if ($arreglo2['nombre_curso'] == 'Ocupacional')
		{
			$arreglo2['nombre_curso'] = $roc['nombre_ocupacion'];
		}
		
		$infot[$j] = array(array('text' => $j, 'align' => 'center'));
		
		switch ($arreglo['id_grado'])
		{
			case 3:
				break;
			default:
				$_merge = false;
				if (in_array($arreglo2['nombre_area'], $_areas))
				{
					$arreglo2['nombre_area'] = '';
					$_merge = true;
				}
				
				$_areas[] = $arreglo2['nombre_area'];
				$infot[$j][] = array('text' => $arreglo2['nombre_area'], 'align' => 'center', 'merge' => $_merge);
				break;
		}
		
		$infot[$j][] = array('text' => $arreglo2['nombre_curso'], 'align' => 'left');
		$infot[$j][] = array('text' => $per_sum, 'align' => 'center');
		$infot[$j][] = array('text' => $lets, 'align' => 'left');
		$infot[$j][] = array('text' => $resultado, 'align' => 'center');
		
		$j++;
	}
	
	$pdf->multitable($infot, 65, $pdf->top(100), 5, 9, 1, array('last_height' => $pdf->top()));
	
	switch ($anio)
	{
		case 2010:
			$day_string = 'quince';
			break;
		case 2011:
			$day_string = 'catorce';
			break;
	}
	
	$text_block = 'En fe de lo anterior se extiende el presente certificado en Santa Elena de la Cruz, Flores, Pet&eacute;n, a los ' . $day_string . ' d&iacute;as del mes de octubre del ' . $cv->cv($anio) . '.';
	
	$pdf->text_wrap($text_block, 11, $pdf->page_width() - 185, 65, $pdf->top(50), 20);
	
	$names = array(array(
		array('text' => $firma1, 'align' => 'center'),
		array('text' => 'Vo. Bo. Lic. Baldomero Fidel Ram&iacute;rez Zabala', 'align' => 'center')
	),
	array(
		array('text' => $firma2, 'align' => 'center'),
		array('text' => 'Director', 'align' => 'center')
	));
	
	$pdf->multitable($names, 35, $pdf->top(100), 5, 11, 0);
	
	$i++;
}

$pdf->cp->ezOutput();
$pdf->cp->stream();
exit;

?>
