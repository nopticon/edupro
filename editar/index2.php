<?php

require_once("../conexion.php");

if (!isset($_POST['grado']))
{
	header('Location: index.php');
	exit;
}

$grado = $_POST['grado'];

$sql = 'SELECT id_grado
	FROM secciones
	WHERE id_seccion = ' . (int) $grado;
$ejecutar = mysql_query($sql);

if (!$gradoar = mysql_fetch_assoc($ejecutar))
{
	exit;
}

$sql = 'SELECT *
	FROM cursos
	WHERE id_grado = ' . (int) $gradoar['id_grado'];
$ejecutar = mysql_query($sql);

while ($arreglo = mysql_fetch_array($ejecutar))
{
	echo '<option value="' . $arreglo['id_curso'] . '" >' . $arreglo['nombre_curso'] . '</option>';
}

exit;

?>