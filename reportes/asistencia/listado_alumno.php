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
<label></label>
                             </td><br/><br/>
  	                  <table width="792" border="0" align="center">
                        <tr>
                          <td width="175">&nbsp;</td>
                          <td width="153"><select id="grado" name="grado">
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
                          <td width="108"><select id="seccion" name="seccion">
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
                          <td width="338"><input type="submit" name="Submit" value="Ver Listado..." /></td>
                        </tr>
                     </table><br/>
	</div>  </form>   
</div>
<?php include('../../menucss.php');?>                    
</body>

</html>
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
