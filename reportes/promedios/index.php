<div id="content" class="float-holder">
<?php
$toproot = '../../';
require_once('../../conexion.php');

?>
<div id="boton1"><a href="../../index.php"><img src="../../images/inicio.png" border=0; /></a></div>
<div id="boton2"><img src="../../images/menu.png" /></div>
<div id="boton4"><img src="../../images/info.jpg" /></div>
<div id="userlog"><?php $nombre = $_SESSION['nombre'];
	echo "Bienvenido; ".$nombre; ?></div>
<div id="boton3"><a href="../../exit.php"><img src="../../images/exit.png" /></a></div>

		<?php include('../../menu.php'); 
		encabezado('Listados de Alumnos', '../');?>
		
        <div id="content2">
		<div class="title">Reportes de Alumnos</div>
			</div>


<table width="98%" border="0" align="center" >
  <tr>
    <td width="98%"><table width="833" border="0" align="center" >
      <tr>
        <td valign="top">&nbsp;</td>
        <td></td>
      </tr>
      <tr>
        <td width="8" valign="top"></td>
        <td width="809"><div align="right">
		<div id="content2">
		<?php include('../../menu.php'); ?>
		</div>
		</div>
            <table width="98%" align="center">
              <tr>
                <td width="98%" ></td>
              </tr>
              <tr>
                <td ><br />
								<form action="listado_alumno1.php" method="get" name="form1" target="_blank" id="form1">
                  <table border="0" cellpadding="5">
                    <tr>
                      <td class="text1 a_right">Grado y secci&oacute;n:</td>
											<td class="text1 a_left"><select id="grado" name="grado">
												<?php
                        
                        $seleccionar = "SELECT * FROM grado WHERE status = 'Alta'";
                        $ejecutar = mysql_query($seleccionar);
                        
                        //echo '<option value="0">Seleccione </option>';
                        //por cada registro encontrado en la tabla me genera un <option>
                        while ($arreglo = mysql_fetch_array($ejecutar))
                        {
                        	echo '<option value="' . $arreglo['id_grado'] . '" >' . $arreglo['nombre'] . '</option>';
                        }
                        
                        ?>
												</select>
                        
												<select id="seccion" name="seccion">
												<?php
                        
                        $seleccionar = "SELECT * FROM secciones WHERE id_grado = 1";
                        $ejecutar = mysql_query($seleccionar);
                        
                        //echo '<option value="0">Seleccione </option>';
                        //por cada registro encontrado en la tabla me genera un <option>
                        while ($arreglo = mysql_fetch_array($ejecutar))
                        {
                        	echo '<option value="' . $arreglo['id_seccion'] . '" >' . $arreglo['nombre_seccion'] . '</option>';
                        }
                        
                        ?>
												</select>
                        </td>
                    </tr>
										<tr>
										<td class="a_right text1">Tiempo de Examen:</td>
				<td class="text1 a_left">
					
					<?php
					
					$seleccionar = "SELECT * FROM examenes";
					$ejecutar = mysql_query($seleccionar);
					
					echo '<select name="examen">';
					
					// por cada registro encontrado en la tabla me genera un <option>
					while ($arreglo = mysql_fetch_array($ejecutar))
					{
						echo '<option value="' . $arreglo['id_examen'] . '" >' . $arreglo['examen'] . '</option>';
					}
					
					echo '</select>';
					
					?>
				</td>
			</tr>
			<tr>
				<td class="text1 a_right">A&ntilde;o:</td>
				<td>
					<select name="anio" id="anio">
						<?php
						  
						  for ($i_year = date('Y'); $i_year >= 2010; $i_year--)
						  {
							echo '<option value="' . $i_year . '">' . $i_year . '</option>';
						  }
						  
						  ?>
					</select>
				</td>
			</tr>
			<tr>
                <td colspan="2">&nbsp;</td>
              </tr>
				<tr>
					<td colspan="2" class="text1 a_center"><input type="submit" name="Submit" value="Ver Listado..." /></td>
				</tr>
                  </table>
				  </form>
</td>
              </tr>
              
            </table>
		  </td>
      </tr>
    </table></td>
  </tr>
</table>
</div>

<script language="JavaScript" type="text/javascript">

function buscar(url) {  
ventana = open(url,"ventana","scrollbars=yes,status=no,toolbar=no,directories=no,menubar=no,resizable=yes,width=350,height=425")  
}  

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

</body>
</html>