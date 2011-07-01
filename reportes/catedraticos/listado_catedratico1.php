<?php

require_once('../../conexion.php');

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Listado de Catedratico con Cursos</title>
<link rel="stylesheet" type="text/css" href="../../style.css"  />

<script src="../../jquery.js" type="text/javascript"></script>

</head>

<body>
<table width="840" border="0" align="center" bgcolor="#000000">
  <tr>
    <td width="830"><table width="833" border="0" align="center" bgcolor="#FFFFFF">
      <tr>
        <td valign="top">&nbsp;</td>
        <td><img src="../../images/fond1.jpg" width="830" height="150" /></td>
      </tr>
      <tr>
        <td width="8" valign="top"><label><br />
              <br />
              <br />
              <a href="../../conexion.php"></a><br />
        </label></td>
        <td width="809"><table width="821" align="center">
              <tr>
                <td width="806" bgcolor="#4682B4"><div class="title"> Reportes de Catedratico con Cursos </div></td>
              </tr>
              <tr bgcolor="#F3F3F3">
                <td bordercolor="#000000" bgcolor="#F3F3F3">
				    <br />
				    <table width="800" border="0">
                      <?php 
				$grado = $_GET['grado'];
				//$seccion = $_GET['seccion'];
				
				$seleccionar = "SELECT * FROM cursos c, catedratico g WHERE c.id_grado = '$grado' AND g.id_catedratico = c.id_catedratico ";
				$ejecutar = mysql_query($seleccionar);
				
				while($arreglo = mysql_fetch_assoc($ejecutar) ){				
				?>
					<tr>
                        <td width="99"></td>
                        <td width="291" class="tex2"><?php echo $arreglo['nombre_curso']; ?></td>
                        <td width="341" class="tex2"><?php echo $arreglo['nombre_catedratico']; ?></td>
                        <td width="51"></td>
                      </tr><?php } ?>
                    </table>
				    <br />
				    <br />
                    <br />
                <div align="center"></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table>
          <table width="820">
              <tr>
                <td width="810"></td>
              </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
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
