<?php

require_once("./conexion.php");

$grado = $_POST['grado'];

$sql = 'SELECT *
	FROM secciones
	WHERE id_grado = ' . (int) $grado;
$ejecutar = mysql_query($sql);

while ($arreglo = mysql_fetch_array($ejecutar))
{
	echo '<option value="' . $arreglo['id_seccion'] . '" >' . $arreglo['nombre_seccion'] . '</option>';
}

exit;

?>