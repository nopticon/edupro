<?php

require_once('../conexion.php');

$id_grado = $_GET['id_grado'];

$seleccionar = "SELECT * FROM grado g, alumno a WHERE a.id_grado = '$id_grado' AND a.id_grado = g.id_grado";
$ejecutar = mysql_query($seleccionar); // || die (mysql_error());

if ($arreglo = mysql_fetch_array($ejecutar))
{
	
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link rel="stylesheet" type="text/css" href="../style.css"  />

<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' es REQUERIDO.\n'; }
  } if (errors) alert('Complete los Siguientes Campos:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
</head>

<body>
<table width="840" border="0" align="center" bgcolor="#000000">
  <tr>
    <td width="830"><form action="../reinscripcion/reinscripcion.php" method="get" name="formulario" id="formulario" onsubmit="MM_validateForm('carne','','R');return document.MM_returnValue">
      <table width="833" border="0" align="center" bgcolor="#FFFFFF">
        <tr>
          <td valign="top">&nbsp;</td>
          <td><img src="../images/fond1.jpg" width="830" height="150" /></td>
        </tr>
        <tr>
          <td width="8" valign="top"><label><br />
            <br />
            <br />
            <a href="../conexion.php"></a><br />
          </label></td>
          <td width="809"><div align="right">
            <table width="353" border="0">
              <tr>
                <td width="24">&nbsp;</td>
                <td width="24">&nbsp;</td>
                <td width="24">&nbsp;</td>
                <td width="172">&nbsp;</td>
                <td width="87"><div align="right"><img src="../images/iconos/chat-home.ico" class="text1" /><span class="text1 Estilo6"><a href="../index.php">Principal</a></span></div></td>
              </tr>
            </table>
           
          </div>
            <table width="821" align="center">
              <tr>
                <td width="806" bgcolor="#4682B4"><div class="title">Modulo de Visualizacion de Notas - Grado </div></td>
              </tr>
              <tr bgcolor="#F3F3F3">
                <td bordercolor="#000000" bgcolor="#F3F3F3"><table width="804" border="0">
                  <tr>
                    <td width="111">&nbsp;</td>
                    <td width="127" class="text1"><div align="right">Carn&eacute;:</div></td>
                    <td width="325" class="Estilo11"><?php echo $arreglo['carne']; ?></td>
                    <td width="73" class="text1"><div align="right"><span class="text1">Fecha:</span></div></td>
                    <td width="146"><span class="text2"><?php echo $arreglo['fecha']; ?></span></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><div align="right" class="text1">Nombres y Apellidos: </div></td>
                    <td class="text2"><?php echo $arreglo['nombre_alumno']; ?><?php echo " , " ?><?php echo $arreglo['apellido']; ?></td>
                    <td><div align="right" class="text1">Telefono:</div></td>
                    <td class="text2"><?php echo $arreglo['telefono1']; ?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><div align="right" class="text1">Email: </div></td>
                    <td class="text2"><?php echo $arreglo['email']; ?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><div align="right" class="text1">Grado:</div></td>
                    <td class="text2"><?php 
				
				$conteo= $arreglo['id_grado'];
				
				switch($conteo){
				case $arreglo['id_grado']:
				echo $arreglo['nombre'] , $arreglo['seccion'];
				break;
				}
				?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><div align="right" class="text1">Encargado:</div></td>
                    <td class="text2"><?php echo $arreglo['encargado_reinscripcion']; ?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                  <br />
                  <table width="750" border="0">
                    <tr>
                      <td><div align="center" class="Estilo6">Curso</div></td>
                      <td width="15%"><div align="center" class="Estilo6">Bimestre I </div></td>
                      <td width="15%"><div align="center" class="Estilo6">Bimestre II </div></td>
                      <td width="15%"><div align="center" class="Estilo6">Bimestre III </div></td>
                      <td width="15%"><div align="center" class="Estilo6">Bimestre IV </div></td>
                      <td width="15%"><div align="center" class="Estilo6">Recuperaci&oacute;n</div></td>
                    </tr>
                  </table>
                  <br />
                  <?php 
				  $id_alumno = $_GET['id_alumno'];

					$seleccionar = "SELECT * FROM cursos c, grado g, alumno a, reinscripcion r WHERE a.id_alumno = '$id_alumno' AND c.id_grado = g.id_grado AND g.id_grado = a.id_grado AND a.id_alumno = r.id_alumno  ";
					
				  //$seleccionar = "SELECT * FROM reinscripcion r, grado g, cursos c WHERE r.id_alumno = '$id_alumno' AND r.id_grado = g.id_grado AND g.id_grado = c.id_grado ";
				  
				 	//$seleccionar = "SELECT * FROM alumno a, grado g, cursos c WHERE g.id_grado = c.id_grado AND a.id_alumno = '$id_alumno' AND a.id_grado = g.id_grado";
					$ejecutar = mysql_query($seleccionar); //|| die (mysql_error());
		
				//var_dump($ejecutar);
	
			while($arreglo = mysql_fetch_assoc($ejecutar)){
	
				  ?>
                  <table width="754" border="0">
                    <tr>
                      <td class="text1"><div align="center"><span class="text1"><?php echo $arreglo['nombre_curso']; ?></span></div></td>
                      <td width="15%"><div align="center" class="Estilo11"></div></td>
                      <td width="15%"><div align="center" class="Estilo11"></div></td>
                      <td width="15%"><div align="center" class="Estilo11"></div></td>
                      <td width="15%"><div align="center" class="Estilo11"></div></td>
                      <td width="15%"><div align="center" class="Estilo11"></div></td>
                    </tr>
                  </table>
                  <?php }?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table>
            <table width="820">
              <tr>
                <td width="810" bgcolor="#999999"><div align="center"></div></td>
              </tr>
            </table>            </td>
        </tr>
      </table>
    </form>
    </td>
  </tr>
</table>
</body>
</html>
<script language="JavaScript" type="text/javascript">
document.formulario.carne.focus();
</script>


<script language="JavaScript" type="text/javascript">
function alerta(){
return window.confirm("¿Seguro que desea Realizar la Acción...?");}
</script>
