<?php

require_once('../conexion.php');

$id_grado = $_GET['id_grado'];

$seleccionar = "SELECT * FROM grado WHERE id_grado = '$id_grado'";
$ejecutar = mysql_query($seleccionar);

if($arreglo = mysql_fetch_assoc($ejecutar))
{
	
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Modificacion de Grados y Secciones</title>
<style type="text/css">
.tex2{
font-family:Tahoma;
color:#000000;
font-size:12px;
}

.text1{
font-family:Tahoma;
color:#000000;
font-size:13px;
}
</style>
<style type="text/css">
<!--
input{
-moz-border-radius: 5px;
background-color : #eaf9ff;
border : 1px solid #000000;
font-family : "Tahoma", Tahoma, monospace;
font-size : 12px;
padding-left : 7px;
padding-right : 7px;
}
.Estilo1 {
	font-size: 24px;
	color: #990000;
}
.Estilo4 {color: #FFFFFF; }
.Estilo5 {
	font-family: Tahoma;
	font-size: 13px;
	color: #FFFFFF;
}
.Estilo6 {color: #990000}
.text2 {font-family:tahoma;
color:#000000;
font-size:12px;
}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: underline;
	color: #990000;
}
a:active {
	text-decoration: none;
	color: #000000;
}
body {
	background-color: #5EC3F9;
}
</style>

<script type="text/JavaScript">
<!--
function validar(){
if(!confirm("Seguro que Desea Guardar el Grado y Seccion?")){
return false;
}
MM_validateForm('grado','','R','seccion','','R');return document.MM_returnValue;
}

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
  } if (errors) alert('Los Siguientes Errores han Ocurrido,\n Complete los Siguientes Campos:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
</head>

<body>
<table width="200" border="0" align="center" bgcolor="#000000">
  <tr>
    <td><table width="840" border="0" align="center" bgcolor="#FFFFFF">
      <tr>
        <td width="830"><form action="cod_mant/cod_man_grado.php" method="post" name="formulario" id="formulario" onsubmit="return validar();">
            <table width="833" border="0">
              <tr>
                <td width="10">&nbsp;</td>
                <td width="813"><table width="811" border="0" align="center">
                    <tr>
                      <td><img src="../images/fond1.jpg" width="830" height="150" /></td>
                    </tr>
                    <tr>
                      <td><div align="right">
                          <table width="353" border="0">
                            <tr>
                              <td width="24">&nbsp;</td>
                              <td width="24">&nbsp;</td>
                              <td width="24">&nbsp;</td>
                              <td width="172"><img src="../images/iconos/84.ico" /> <a href="index.php">Mantenimiento</a></td>
                              <td width="87"><div align="right"><img src="../images/iconos/chat-home.ico" class="text1" /><span class="text1 Estilo6"><a href="../index.php">Principal</a></span></div></td>
                            </tr>
                          </table>
                      </div></td>
                    </tr>
                    <tr>
                      <td width="789" bgcolor="#4682B4"><div align="center" class="Estilo4">Modulo de Modificacion de Grados </div></td>
                    </tr>
                    <tr>
                      <td bgcolor="#F3F3F3"><table width="645" border="0" align="left">
                          <tr>
                            <td width="10" class="text1">&nbsp;</td>
                            <td width="183"><div align="right" class="text1">
                                <p>Nombre del Grado: </p>
                            </div></td>
                            <td width="438"><label>
                              <input name="grado" type="text" id="grado" size="60" autocomplete="off" value="<?php echo $arreglo['nombre']; ?>" style="background-color:#E6E6FA; text-align:center; border:#4682B4 2px solid; font-size: 12px;" />
                            </label></td>
                          </tr>
                          <tr>
                            <td class="text1">&nbsp;</td>
                            <td class="text1"><div align="right">Secci&oacute;n:</div></td>
                            <td><label>
                              <input name="seccion" type="text" id="seccion" autocomplete ="off" style="background-color:#E6E6FA; text-align:center; border:#4682B4 2px solid; font-size: 12px;" value="<?php echo $arreglo['seccion']; ?>" />
                            </label></td>
                          </tr>
                          <tr>
                            <td class="text1">&nbsp;</td>
                            <td class="text1"><div align="right">Status:</div></td>
                            <td><label>
                              <select name="status" id="status" style="background-color:#E6E6FA; border:#4682B4 2px solid; font-size: 12px;">
                                <option value="Alta">Alta</option>
                                <option value="Baja">Baja</option>
                              </select>
                            </label></td>
                          </tr>
                          <tr>
                            <td class="text1">&nbsp;</td>
                            <td class="text1"><input name="id_conteo" type="hidden" id="id_conteo" value="<?php echo $arreglo['id_grado']; ?>" /></td>
                            <td><table width="290" border="0">
                                <tr>
                                  <td><label>
                                    <input type="reset" name="Submit" value="Limpiar" />
                                  </label></td>
                                  <td><label>
                                    <input type="submit" name="Submit2" value="Guardar" />
                                  </label></td>
                                </tr>
                            </table></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                    <br />
                    <table width="817" border="0">
                      <tr>
                        <td bgcolor="#999999"><div align="center" class="Estilo4">Visualizaci&oacute;n de Grados y Secciones Actuales </div></td>
                      </tr>
                      <tr>
                        <td bgcolor="#4682B4"><table width="805" border="0">
                            <tr>
                              <td width="10">&nbsp;</td>
                              <td width="503" class="text1"><div align="center" class="Estilo4">Grado</div></td>
                              <td width="125"><div align="center" class="text1 Estilo4">Secci&oacute;n</div></td>
                              <td width="149"><div align="center" class="Estilo5">Modificar</div></td>
                            </tr>
                        </table></td>
                      </tr>
                    </table>
                  <br />
                    <br />
                    <?php 
				  
				  $seleccionar = "SELECT * FROM grado";
				  $ejecutar = mysql_query($seleccionar);
				  
				  while($arreglo = mysql_fetch_assoc($ejecutar))
				  {				  
				  ?>
                    <br />
                    <table width="812" border="0">
                      <tr>
                        <td width="71">&nbsp;</td>
                        <td width="38"><input name="id_grado" type="hidden" id="id_grado" value="<?php echo $arreglo['id_grado']; ?>" /></td>
                        <td width="404"><div align="center" class="Estilo6">
                            <div align="left" class="text2"><a href="mod_grados.php?id_grado=<?php echo $arreglo['id_grado']; ?>"><?php echo $arreglo['nombre']; ?></a></div>
                        </div></td>
                        <td width="127"><div align="center" class="text2"><?php echo $arreglo['seccion']; ?></div></td>
                        <td width="150" class="Estilo6"><div align="center" class="text2"><a href="mod_grados.php?id_grado=<?php echo $arreglo['id_grado']; ?>"><img src="../images/iconos/104.ico" border="0" /></a></a></div></td>
                      </tr>
                    </table>
                  <?php }?></td>
              </tr>
            </table>
        </form></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>