<div id="content" class="float-holder">
<?php
require_once('../conexion.php');

$carne = $_GET['carne'];
$subcarne = substr($carne, 5);

$seleccionar = "SELECT * FROM alumno a, reinscripcion r, grado g  WHERE r.id_alumno = a.id_alumno AND g.id_grado = r.id_grado AND  a.id_alumno = '$subcarne' ORDER BY a.id_alumno DESC";
$ejecutar = mysql_query($seleccionar);

if (!$arreglo = mysql_fetch_assoc($ejecutar))
{
	header("location: index.php");
} 

?>
<div id="boton1"><a href="../index.php"><img src="../images/inicio.png" /></a></div>
<div id="boton2"><img src="../images/menu.png" /></div>
<div id="boton3"><a href="../exit.php"><img src="../images/exit.png" /></a></div>

	<?php include('../menu.php');
	encabezado('Reinscripci&oacute;n del Alumnoo');?>
<div id="conten2">
<div class="title">Reinscripci&oacute;n del Alumno</div>
<form action="cod_reinscripcion.php" method="post" name="formulario" id="formulario" onsubmit="return validarreinscripcion2();">
            
                    <table width="821" align="center">
                      <tr>
                        <td ><table width="583" border="0" align="center">
                            <tr>
                              <td width="3" class="text1">&nbsp;</td>
                              <td width="184" class="Estilo6 Estilo7">Datos Alumno: </td>
                              <td width="319"><label>
                                <input name="id_alumno" type="hidden" id="id_alumno" value="<?php echo $arreglo['id_alumno']; ?>" />
                                <input name="carnet" type="hidden" id="carnet" value="<?php echo $arreglo['carne']; ?>" />
                              </label></td>
                            </tr>
                            <tr>
                              <td class="text1">&nbsp;</td>
                              <td class="text1"><div align="right" class="text2">Carn&eacute;:</div></td>
                              <td><label><span class="text1">
                                <input name="carne" type="text" id="carne" aurotomplete="off"  size="20"  autocomplete="off" value="<?php echo $arreglo['carne']; ?>" disabled="disabled" />
                              </span></label></td>
                            </tr>
                            <tr>
                              <td class="text1">&nbsp;</td>
                              <td class="text1">&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td class="text1">&nbsp;</td>
                              <td class="text1">&nbsp;</td>
                              <td><label></label></td>
                            </tr>
                            <tr>
                              <td class="text1">&nbsp;</td>
                              <td class="text1"><div align="right" class="text2">Nombre:</div></td>
                              <td class="text1"><input name="nombre" type="text" id="nombre" aurotomplete="off" size="60"  autocomplete="off" value="<?php echo $arreglo['nombre_alumno']; ?>" disabled="disabled" /></td>
                            </tr>
                            <tr>
                              <td class="text1">&nbsp;</td>
                              <td class="text1"><div align="right" class="text2">Apellido:</div></td>
                              <td class="text1"><input name="apellido" type="text" id="apellido" aurotomplete="off" size="60"  autocomplete="off" value="<?php echo $arreglo['apellido']; ?>" disabled="disabled" /></td>
                            </tr>
                            <tr>
                              <td class="text1">&nbsp;</td>
                              <td class="text1">&nbsp;</td>
                              <td class="text1">&nbsp;</td>
                            </tr>
                            <tr>
                              <td class="text1">&nbsp;</td>
                              <td class="Estilo6">Datos Padres: </td>
                              <td class="text1">&nbsp;</td>
                            </tr>
                            <tr>
                              <td class="text1">&nbsp;</td>
                              <td class="text1"><div align="right" class="text2">Padre:</div></td>
                              <td class="text1"><input name="padre" type="text" id="padre" aurotomplete="off" size="60"  autocomplete="off" value="<?php echo $arreglo['padre']; ?>" disabled="disabled" /></td>
                            </tr>
                            <tr>
                              <td class="text1"><div align="right"></div></td>
                              <td class="text1"><div align="right" class="text2">Madre:</div></td>
                              <td class="text1"><input name="madre" type="text" id="madre" aurotomplete="off"  size="60"  autocomplete="off" value="<?php echo $arreglo['madre']; ?>" disabled="disabled" /></td>
                            </tr>
                            <tr>
                              <td class="text1">&nbsp;</td>
                              <td class="text1">&nbsp;</td>
                              <td class="text1">&nbsp;</td>
                            </tr>
                            <tr>
                              <td class="text1">&nbsp;</td>
                              <td class="Estilo6"><span class="Estilo6">Datos Encargado:<?php echo date("Y"); ?></td>
                              <td class="text1">&nbsp;</td>
                            </tr>
                            <tr>
                              <td class="text1">&nbsp;</td>
                              <td class="text1"><div align="right" class="text2">Encargado:</div></td>
                              <td class="text1"><input name="encargado" type="text" id="encargado" aurotomplete="off" size="60"  autocomplete="off" /></td>
                            </tr>
                            <tr>
                              <td class="text1">&nbsp;</td>
                              <td class="text1"><div align="right" class="text2">Tel&eacute;fonos:</div></td>
                              <td class="text1"><input name="telefonos" type="text" id="telefonos" aurotomplete="off" size="60"  autocomplete="off" /></td>
                            </tr>
                            <tr>
                              <td class="text1">&nbsp;</td>
                              <td class="Estilo6 Estilo7">Grado a Cursar : </td>
                              <td class="Estilo4"><label></label></td>
                            </tr>
                            <tr>
                              <td class="text1">&nbsp;</td>
                              <td class="text1"><div align="right" class="text2">Grado:</div></td>
                              <td><select id="grado" name="grado">
					<?php
					
					$sql = "SELECT id_grado
						FROM reinscripcion
						WHERE carne = '" . $carne . "'
						ORDER BY id_grado DESC
						LIMIT 1";
					$u_grado = mysql_query($sql);
					
					$last_grade = 0;
					if ($u_result = mysql_fetch_array($u_grado))
					{
						$last_grade = $u_result['id_grado'];
					}
					
					$seleccionar = "SELECT *
						FROM grado
						WHERE status = 'Alta' 
						AND id_grado > " . $last_grade;
					$ejecutar = mysql_query($seleccionar);
					
					$primer_seccion = 0;
					while ($arreglo = mysql_fetch_array($ejecutar))
					{
						if (!$primer_seccion)
						{
							$primer_seccion = $arreglo['id_grado'];
						}
						
						echo '<option value="' . $arreglo['id_grado'] . '" >' . $arreglo['nombre'] . '</option>';
					}
					
					?>
					</select></td>
                            </tr>
                            <tr>
                              <td class="text1">&nbsp;</td>
                              <td class="text1"><div align="right">Seccion</div></td>
                              <td><select id="seccion" name="seccion">
						<?php
						
						$seleccionar = "SELECT * FROM secciones WHERE id_grado = " . $primer_seccion;
						$ejecutar = mysql_query($seleccionar);
						
						//echo '<option value="0">Seleccione </option>';
						//por cada registro encontrado en la tabla me genera un <option>
						while ($arreglo = mysql_fetch_array($ejecutar))
						{
							echo '<option value="' . $arreglo['id_seccion'] . '" >' . $arreglo['nombre_seccion'] . '</option>';
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
                              <td class="text1"><div align="right" class="text2">Observaci&oacute;n:</div></td>
                              <td><label><span class="text1">
                                <textarea name="observacion" cols="40" id="observacion" aurotomplete="off" autocomplete="off"></textarea>
                              </span></label></td>
                            </tr>
                            <tr>
                              <td class="text1">&nbsp;</td>
                              <td class="text1">&nbsp;</td>
                              <td><table width="335" border="0">
                                  
                                  <tr>
                                    <td width="104">&nbsp;</td>
                                    <td width="221"><input name="submit" type="image" src="../images/save.png" /></td>
                                  </tr>
                              </table></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                  <table width="820">
                      <tr>
                        <td width="810" bgcolor="#999999"><div align="center" class="">Historial de Grados </div></td>
                      </tr>
                      <tr>
                        <td bgcolor="#4682B4"><table width="808" border="0">
                            <tr>
                              <td width="94" class="Estilo4"><div align="center">A&ntilde;o</div></td>
                              <td width="342"><div align="center" class="Estilo4">Grado</div></td>
                              <td width="248"><div align="center" class="Estilo4">Encargado</div></td>
                              <td width="106"><div align="center" class="Estilo4">Fech. Inscrip. </div></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td bgcolor="#F3F3F3"><br />
                            <?php 
				  $carne = $_GET['carne'];
		$seleccionar = "SELECT *
			FROM reinscripcion r, alumno a, grado g, secciones s
			WHERE r.id_alumno = a.id_alumno
				AND r.id_grado = g.id_grado
				AND r.carne = '$carne'
				AND s.id_seccion = r.id_seccion
				AND s.id_grado = g.id_grado";
		$ejecutar = mysql_query($seleccionar);

		while($arreglo = mysql_fetch_assoc($ejecutar)){

?>
                            <br />
                            <table width="808" border="0">
                              <tr>
                                <td width="94" class="Estilo6"><div align="center" class="text2"><?php echo $arreglo['anio']; ?></div></td>
                                <td width="342"><div align="center" class="Estilo6">
                                    <div align="left"><span class="tex2"><?php echo $arreglo['nombre'] . ' ' . $arreglo['nombre_seccion']; ?></span></div>
                                </div></td>
                                <td width="252" align="left" class="text2"><div align="left"><?php echo $arreglo['encargado_reinscripcion']; ?></div></td>
                                <td width="102" class="text2"><?php echo $arreglo['fecha_reinscripcion']; ?></td>
                              </tr>
                            </table>
                          <?php }?>
                            <br />
                            <br /></td>
                      </tr>
                  </table></td>
              </tr>
            </table>
        </form>
      


<script language="JavaScript" type="text/javascript">
document.formulario.encargado.focus();

//<![CDATA[
function alerta(){
return window.confirm("�Seguro que desea Realizar la Acci�n...?");}

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

</script>
</body>
</html>