
<div id="content" class="float-holder">


<?php
require_once('../conexion.php');
?>
<div id="boton1"><a href="../index.php"><img src="../images/inicio.png" border=0; /></a></div>
<div id="boton2"><img src="../images/menu.png" /></div>
<div id="boton4"><img src="../images/info.jpg" /></div>
<div id="userlog"><?php $nombre = $_SESSION['nombre'];
	echo "Bienvenido; ".$nombre; ?></div>
<div id="boton3"><a href="../exit.php"><img src="../images/exit.png" /></a></div>

		<?php
		include('../menu.php'); 
		encabezado('Ingreso de Alumnos');
		?>
        
		<div id="content2">		
		<div class="title">Ingreso de nuevo alumno</div>
	</div>
	
	<div class="blue">
	<form action="cod_alumnos.php" method="post" name="formulario" id="formulario" onsubmit="return validarinscripcion();">
		
		<table width="100%" border="0" align="center">
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>
					<table width="100%" border="0" align="right">
						<tr>
						  <td width="245" class="text1"><div align="right">C&oacute;digo del alumno: </div></td>
						  <td width="414"><input name="codigo_alumno" type="text" id="textred" size="25" autocomplete ="off" /></td>
					  </tr>
					</table>				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td class="Estilo6 a_right">&nbsp;</td>
				<td><div align="center" class="textred">Datos Alumnos</div></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td width="138">&nbsp;</td>
				<td width="137" class="text1 a_right">Nombres:</td>
				<td width="413"><input name="nombre" type="text" id="nombre" size="60" autocomplete="off" style="" /></td>
			</tr>
			<tr>
				<td class="text1">&nbsp;</td>
				<td class="text1 a_right">Apellidos:</td>
				<td><input name="apellido" type="text" id="apellido" size="60" autocomplete="off" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td class="text1 a_right">Direcci&oacute;n:</td>
				<td><input name="direccion" type="text" id="direccion"  autocomplete="off" size="60" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td class="text1 a_right">Tel&eacute;fono:</td>
				<td><table width="375" border="0" align="left">
					<tr>
						<td width="77"><input name="telefono1" type="text" id="telefono1" size="10" autocomplete ="off" /></td>
						<td width="146" class="text1 a_right">Edad:</td>
						<td width="222"><input name="edad" type="text" id="edad" value=" A&ntilde;os" size="12" autocomplete ="off"/></td>
					</tr>
				</table></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td class="text1 a_right">Sexo:</td>
				<td><table width="370" border="0" align="left">
					<tr>
						<td width="94"><select name="sexo" id="sexo">
							<option value="M">Masculino</option>
							<option value="F">Femenino</option>
						</select></td>
						<td width="136"><div align="right" class="text1">E-Mail:</div></td>
						<td width="215"><input name="email" type="text" id="email" size="12" autocomplete="off" /></td>
					</tr>
				</table></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td class="text1 a_right">&nbsp;</td>
				<td><div align="center" class="textred">Datos Padres</div></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td class="text1 a_right">Padre:</td>
				<td><input name="padre" type="text" id="padre" size="60" autocomplete ="off" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td class="text1 a_right">Madre:</td>
				<td><input name="madre" type="text" id="madre" size="60" autocomplete="off" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td class="Estilo6 a_right">&nbsp;</td>
				<td><div align="center" class="textred">Datos Encargado <?php echo date("Y"); ?></div></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td class="text1 a_right">Encargado:</td>
				<td><input name="encargado" type="text" id="encargado" size="60" autocomplete="off" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td class="text1 a_right">Profesi&oacute;n u Oficio:</td>
				<td><input name="profesion" type="text" id="profesion" size="60" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td class="text1 a_right">Laborando en:</td>
				<td><input name="labor" type="text" id="labor" size="60" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td class="text1 a_right">Direcci&oacute;n:</td>
				<td><input name="direccion2" type="text" id="direccion2" size="60" autocomplete="off"/></td>
			</tr>
			<tr>
				<td class="text1 a_right">&nbsp;</td>
				<td class="text1 a_right">CEDULA Orden:</td>
				<td><table width="351" border="0" align="left">
					<tr>
						<td width="77"><select name="orden" id="orden">
							<option value="A01">A01</option>
							<option value="B02">B02</option>
							<option value="C03">C03</option>
							<option value="D04">D04</option>
							<option value="E05">E05</option>
							<option value="F06">F06</option>
							<option value="G07">G07</option>
							<option value="H08">H08</option>
							<option value="I09">I09</option>
							<option value="J10">J10</option>
							<option value="K11">K11</option>
							<option value="L12">L12</option>
							<option value="M13">M13</option>
							<option value="N14">N14</option>
							<option value="&Ntilde;15">&Ntilde;15</option>
							<option value="016">O16</option>
							<option value="P17">P17</option>
							<option value="Q18">Q18</option>
							<option value="R19">R19</option>
							<option value="S20">S20</option>
							<option value="T21">T21</option>
							<option value="U22">U22</option>
						</select></td>
						<td width="146" class="text1 a_right">Registro:</td>
						<td width="222"><input name="registro" type="text" id="registro" size="12" autocomplete ="off" /></td>
					</tr>
				</table></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td class="text1"><div align="right">D.P.I.</div></td>
				<td><input name="dpi" type="text" id="dpi" size="60" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td class="text1 "><div align="right">Docto. Extendido:</div></td>
				<td><input name="extendido" type="text" id="extendido" size="60" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td class="text1">En caso de <span class="Estilo6">Emergencia</span> avisar a:</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><table width="312" border="0" align="left">
					<tr>
						<td class="text1" width="85"><input name="emergencia" type="radio" class="text1" value="Padre" /> Padre</td>
						<td class="text1" width="88"><input name="emergencia" type="radio" value="Madre" /> Madre</td>
						<td class="text1" width="272"><input name="emergencia" type="radio" value="Encargado" /> Encargado</td>
					</tr>
				</table></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td class="text1">Telefonos: <input name="telefono2" type="text" id="telefono2" autocomplete="off" /></td>
			</tr>
			<tr>
				<td class="text1">&nbsp;</td>
				<td class="text1">&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td class="Estilo6 a_right">&nbsp;</td>
				<td class="text1"><div align="center" class="textred">Inscripci&oacute;n <?php echo date("Y"); ?></div></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td class="text1">&nbsp;</td>
				<td class="text1 a_right">Grado:</td>
				<td><select id="grado" name="grado">
					<?php
					
					$seleccionar = "SELECT * FROM grado WHERE id_grado = 1 AND status = 'Alta'";
					$ejecutar = mysql_query($seleccionar);
					
					//por cada registro encontrado en la tabla me genera un <option>
					while ($arreglo = mysql_fetch_array($ejecutar))
					{
						echo '<option value="' . $arreglo['id_grado'] . '" >' . $arreglo['nombre'] . '</option>';
					}
					
					?>
					</select></td>
				</tr>
				<tr>
					<td class="text1">&nbsp;</td>
					<td class="text1"><div align="right">Seccion:</div></td>
					<td><select id="seccion" name="seccion">
						<?php
						
						$seleccionar = "SELECT * FROM secciones WHERE id_grado = 1";
						$ejecutar = mysql_query($seleccionar);
						
						while ($arreglo = mysql_fetch_array($ejecutar))
						{
							echo '<option value="' . $arreglo['id_seccion'] . '" >' . $arreglo['nombre_seccion'] . '</option>';
						}
						
						?>
					</select></td>
				</tr>
			</table>
			
			<br /><br />
			<div align="center"><input type="image" class="inone" name="submit" src="../images/save.png" title="Guardar Nuevo Alumno" /></div>
    </form>
		</div>
</div>

<script type="text/javascript">
//<![CDATA[
document.formulario.codigo_alumno.focus();

function alerta() {
	return window.confirm("Seguro que desea realizar la accion?");
}

$(function() {
	$('#grado').change(function() {
		$.ajax({
			type: "POST",
			url: "../actseccion.php",
			data: "grado=" + this.value,
			success: function(msg) {
				$('#seccion').html(msg);
			}
 });
	});
});

//]]>
</script>
<?php include('../menucss.php'); ?>
</body>
</html>