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
		<div class="title">Listados de alumnos</div>
			</div>
	
	<div class="blue">
						<form action="listado_alumno1.php" method="get" name="form1" target="_blank" id="form1">
						<br /> <br /> <br /> 
						  <table width="100%" border="0">
                            <tr>
                              <td width="33%" align="right" class="text1">Grado:
                                <select id="grado" name="grado">
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
                              </select></td>
                              <td width="18%" align="right" class="text1">Secci&oacute;n:
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
                                </select></td>
                              <td width="15%" align="right" class="text1">A&ntilde;o:
                                <select name="anio">
                                  <?php
						  
						  for ($i_year = date('Y'); $i_year >= 2010; $i_year--)
						  {
							echo '<option value="' . $i_year . '">' . $i_year . '</option>';
						  }
						  
						  ?>
                                </select></td>
                              <td width="34%"><input name="submit" type="image" src="../../images/buscar2.png" title="Ingreso de Codigos Estudiantiles..."  /></td>
                            </tr>
                          </table>
						  <br /> <br /> <br />
                          <label></label>
                      </form> 
                          
</form>

	</div>
</div>
<?php include('../../menucss.php');?>
<script language="JavaScript" type="text/javascript">
document.formulario.carne.focus();
</script>


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