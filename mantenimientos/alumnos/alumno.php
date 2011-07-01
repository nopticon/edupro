<div id="content" class="float-holder">
<?php
$toproot = '../../';
require_once('../../conexion.php');

$carne = $_GET['carne'];
$seleccionar = "SELECT * FROM alumno WHERE carne ='$carne'";
$ejecutar = mysql_query($seleccionar);
if(!$arreglo = mysql_fetch_assoc($ejecutar))
{
	header('location: index.php');
}

$sql = 'SELECT *
	FROM reinscripcion
	WHERE id_alumno = ' . (int) $arreglo['id_alumno'] . '
		AND anio = ' . date('Y');
$ejecutar2 = mysql_query($sql);

$reins = mysql_fetch_array($ejecutar2);
?>
<div id="boton1"><a href="../../index.php"><img src="../../images/inicio.png" border=0; /></a></div>
<div id="boton2"><img src="../../images/menu.png" /></div>
<div id="boton4"><img src="../../images/info.jpg" /></div>
<div id="userlog"><?php $nombre = $_SESSION['nombre'];
	echo "Bienvenido; ".$nombre; ?></div>
<div id="boton3"><a href="../../exit.php"><img src="../../images/exit.png" /></a></div>

	<div id="content2">
		<?php include('../../menu.php'); 
		encabezado('Mantenimiento Alumno', '../'); ?>
		
		<div class="title">Mantenimiento Alumno</div>
	</div>
	
	<div class="blue">

	<form action="../cod_mant/cod_man_alumno.php" method="post" name="formulario" id="formulario" onsubmit="return validar()">
	
	<table width="583" border="0" align="center">
                      <tr>
                        <td width="3" class="text1">&nbsp;</td>
                        <td width="184" class="Estilo6">Datos Alumno: </td>
                        <td width="319"><label>
                          <input name="id_alumno" type="hidden" id="id_alumno" value="<?php echo $arreglo['id_alumno']; ?>" />
                          <input name="carnet" type="hidden" id="carnet" value="<?php echo $arreglo['carne']; ?>" />
                        </label></td>
                      </tr>
                      <tr>
                        <td class="text1">&nbsp;</td>
                        <td class="text1"><div align="right">Carn&eacute;:</div></td>
                        <td><label><span class="text1">
                          <input name="carne" type="text" id="carne" aurotomplete="off" size="20"  autocomplete="off" value="<?php echo $arreglo['carne']; ?>"  disabled="disabled" />
                        </span></label></td>
                      </tr>
											<tr>
				<td class="text1">&nbsp;</td>
				<td class="text1 a_right">Grado:</td>
				<td><select id="grado" name="grado">
					<?php
					
					$seleccionar = "SELECT * FROM grado WHERE status = 'Alta'";
					$ejecutar = mysql_query($seleccionar);
					
					//echo '<option value="0">Seleccione </option>';
					//por cada registro encontrado en la tabla me genera un <option>
					while ($arreglo5 = mysql_fetch_array($ejecutar))
					{
						echo '<option value="' . $arreglo5['id_grado'] . '"' . (($arreglo5['id_grado'] == $reins['id_grado']) ? ' selected="selected"' : '') . '>' . $arreglo5['nombre'] . '</option>';
					}
					
					?>
					</select></td>
				</tr>
				<tr>
					<td class="text1">&nbsp;</td>
					<td class="text1"><div align="right">Seccion:</div></td>
					<td><select id="seccion" name="seccion">
						<?php
						
						$seleccionar = "SELECT * FROM secciones WHERE id_grado = " . (int) $reins['id_grado'];
						$ejecutar = mysql_query($seleccionar);
						
						//echo '<option value="0">Seleccione </option>';
						//por cada registro encontrado en la tabla me genera un <option>
						while ($arreglo6 = mysql_fetch_array($ejecutar))
						{
							echo '<option value="' . $arreglo6['id_seccion'] . '"' . (($arreglo6['id_seccion'] == $reins['id_seccion']) ? ' selected="selected"' : '') . '>' . $arreglo6['nombre_seccion'] . '</option>';
						}
						
						?>
					</select></td>
				</tr>
                      <tr>
                        <td class="text1">&nbsp;</td>
                        <td class="text1">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td class="text1">&nbsp;</td>
                        <td class="text1"><div align="right">Codigo del Alumno: </div></td>
                        <td><label>
                          <input  name="codigo_alumno" type="text" id="codigo_alumno" value="<?php echo $arreglo['codigo_alumno']; ?>" autocomplete="off" />
                        </label></td>
                      </tr>
                      <tr>
                        <td class="text1">&nbsp;</td>
                        <td class="text1">&nbsp;</td>
                        <td><label></label></td>
                      </tr>
                      <tr>
                        <td class="text1">&nbsp;</td>
                        <td class="text1"><div align="right">Nombre:</div></td>
                        <td class="text1"><input name="nombre" type="text" id="nombre"  size="60"  autocomplete="off" value="<?php echo $arreglo['nombre_alumno']; ?>" /></td>
                      </tr>
                      <tr>
                        <td class="text1">&nbsp;</td>
                        <td class="text1"><div align="right">Apellido:</div></td>
                        <td class="text1"><input name="apellido" type="text" id="apellido" size="60"  autocomplete="off" value="<?php echo $arreglo['apellido']; ?>" /></td>
                      </tr>
                      <tr>
                        <td class="text1">&nbsp;</td>
                        <td class="text1">&nbsp;</td>
                        <td class="text1">&nbsp;</td>
                      </tr>
                      <tr>
                        <td class="text1">&nbsp;</td>
                        <td class="text1"><div align="right">Direcci&oacute;n</div></td>
                        <td class="text1"><input name="direccion" type="text" id="direccion" size="60"  autocomplete="off" value="<?php echo $arreglo['direccion']; ?>" /></td>
                      </tr>
                      <tr>
                        <td class="text1">&nbsp;</td>
                        <td class="text1"><div align="right">Telefono:</div></td>
                        <td class="text1"><input name="telefono" type="text" id="telefono" size="60"  autocomplete="off" value="<?php echo $arreglo['telefono1']; ?>" /></td>
                      </tr>
                      <tr>
                        <td class="text1">&nbsp;</td>
                        <td class="text1"><div align="right">Email:</div></td>
                        <td class="text1"><input name="email" type="text" id="email" size="60"  autocomplete="off" value="<?php echo $arreglo['email']; ?>" /></td>
                      </tr>
                      <tr>
                        <td class="text1">&nbsp;</td>
                        <td class="Estilo6">Datos Padres: </td>
                        <td class="text1">&nbsp;</td>
                      </tr>
                      <tr>
                        <td class="text1">&nbsp;</td>
                        <td class="text1"><div align="right">Padre:</div></td>
                        <td class="text1"><input name="padre" type="text" id="padre" size="60"  autocomplete="off" value="<?php echo $arreglo['padre']; ?>" /></td>
                      </tr>
                      <tr>
                        <td class="text1"><div align="right"></div></td>
                        <td class="text1"><div align="right">Madr&eacute;:</div></td>
                        <td class="text1"><input name="madre" type="text" id="madre" size="60"  autocomplete="off" value="<?php echo $arreglo['madre']; ?>" /></td>
                      </tr>
                      <tr>
                        <td class="text1">&nbsp;</td>
                        <td class="text1">&nbsp;</td>
                        <td class="text1">&nbsp;</td>
                      </tr>
                      <tr>
                        <td class="text1">&nbsp;</td>
                        <td class="Estilo4">&nbsp;</td>
                        <td class="Estilo4"><table width="354" border="0">
                            <tr>
                              <td width="84"><label></label></td>
                              <td width="63">&nbsp;</td>
                              <td width="193"><input type="submit" name="Submit" value="Modificar Alumno" /></td>
                            </tr>
                        </table></td>
                      </tr>
                  </table>
	
    </form>
		
		</div>
		</div>
		
<script language="JavaScript" type="text/javascript">
document.formulario.nombre.focus();

function alerta(){
return window.confirm("Seguro que desea Realizar la Accion...?");}

$(function() {
	$('#grado').change(function() {
		$.ajax({
			type: "POST",
			url: "../../actseccion.php",
			data: "grado=" + this.value,
			success: function(msg) {
				$('#seccion').html(msg);
			}
 });
	});
});

</script>
<?php include('../../menucss.php'); ?>
</body>
</html>