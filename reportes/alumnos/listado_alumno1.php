<div id="content" class="float-holder">
<?php

require_once('../../conexion.php');

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Listado de Alumnos en Grado</title>
<link rel="stylesheet" type="text/css" href="../../style.css"  />

</head>

<body>

<table width="100%" border="0" align="center" >
  <tr>
    <td ><table width="833" border="0" align="center" >
      <tr>
        <td width="8" valign="top"><label><br />
              <br />
              <br />
            <br />
        </label></td>
        <td width="809"><table width="821" align="center">
              <tr>
                <td width="806"></td>
              </tr>
              <tr >
                <td><br />
                  <table width="776" border="0">
                    <tr>
                      <td width="58">&nbsp;</td>
                      <td width="681" class="text1">Nombre del Grado:<span class="textred" >
                       <?php 
				$grado = $_GET['grado'];
				$seccion = $_GET['seccion'];
				$anio = $_GET['anio'];
				
				$seleccionar = "SELECT *
					FROM grado g, secciones s
					WHERE g.id_grado ='$grado'
						AND s.id_seccion = '$seccion'
						AND g.id_grado = s.id_grado";
				$ejecutar = mysql_query($seleccionar);
				
				if($arreglo = mysql_fetch_assoc($ejecutar)){
				}
				
				//$conteo= $arreglo['id_grado'];
				
				echo $arreglo['nombre'] . '<br /></span><br />Secci&oacute;n: <span class="textred">', $arreglo['nombre_seccion'] . '<br /></span><br />A&ntilde;o: <span class="textred" > ' . $anio;
				?><br /></span><br />Asignatura: _______________________________________________
				<br /><br />Catedr&aacute;tico: _______________________________________________<br /><br />
				
				<table width="100%">
												<tr>
													<td width="100" class="text1">Trimestres:</td>
													<td align="left" class="textred">1er _____ 2do _____ 3ro _____</td>
												</tr>
						</table>
				
				</td>
                      <td width="23"><div align="center"><img src="../../images/logo.jpg" width="110" height="117" /></div></td>
                    </tr>
                  </table>
                <br />
                    <div align="center"></div></td>
              </tr>
            </table>
          <table width="820">
						<tr>
                <td><table width="796" border="0">
                  <tr>
                    <td colspan="2">&nbsp;</td>
<td width="224">
<table width="100%" border="1" style="border-collapse:collapse">
												<tr>
													<td width="33%" class="a_center text3">Afect.</td>
													<td width="33%" class="a_center text3">Cong/Psic</td>
													<td width="33%" class="a_center text3">TOTAL</td>
												</tr>
											</table>
					  </td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td width="810">
				<?php 
				$anio1 = date('Y');
				$anio = $_GET['anio'];
				
				$seleccionar = "SELECT *
					FROM alumno a, grado g, reinscripcion r
					WHERE r.id_alumno = a.id_alumno
						AND g.id_grado = r.id_grado
						AND r.id_grado = '$grado'
						AND r.id_seccion = '$seccion'
						AND r.anio = '$anio'
					ORDER BY a.apellido, a.nombre_alumno ASC ";
				$ejecutar = mysql_query($seleccionar);
				
				$i = 0;
				while($arreglo = mysql_fetch_assoc($ejecutar)){
				
				?></td>
              </tr>
              <tr>
                <td><table border="0">
                  <tr>
                    <td width="73" class="textblack">&nbsp;</td>
                    <td width="148" class="textblack"><?php echo $arreglo['carne']; ?></td>
                    <td width="335" class="textblack"><?php echo $arreglo['apellido']." , ".$arreglo['nombre_alumno']; ?></td>
                    <td width="238" class="textblack">
											<table width="93%" border="1" style="border-collapse:collapse">
												<tr>
													<td width="33%">&nbsp;</td>
													<td width="33%">&nbsp;</td>
													<td width="33%">&nbsp;</td>
												</tr>
											</table>					  </td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="center"><?php $i++; }?> 
                <br /><br /><span class="textblue">Total de alumnos:</span> <span class="textred"><?php echo $i; ?></span>
                </td>
              </tr>
             
          </table>
					
					<br />
				
					<br /><br /><div class="a_center">_______________________________________________<br /><br />Firma de catedr&aacute;tico</div>
					<br /><br />
		  </td>
      </tr>
    </table></td>
  </tr>
</table>
</div>
</body>
</html>
<script language="JavaScript" type="text/javascript">
document.formulario.carne.focus();
</script>


<script language="JavaScript" type="text/javascript">

function buscar(url) {  
ventana = open(url,"ventana","scrollbars=yes,status=no,toolbar=no,directories=no,menubar=no,resizable=yes,width=350,height=425")  
}  
</script>
