<?php

require_once('../../conexion.php');

$id_catedratico = $_GET['id_catedratico'];

$seleccionar = "SELECT * FROM catedratico WHERE id_catedratico = '$id_catedratico'";
$ejecutar = mysql_query($seleccionar);

if($arreglo = mysql_fetch_assoc($ejecutar)){
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ingreso de Cadedr&aacute;ticos</title>
<link rel="stylesheet" type="text/css" href="../../style.css" />


<script type="text/JavaScript">
<!--

function validar(){
if(!confirm("Seguro que Desea Realizar esta Acción...")){
return false;
}
MM_validateForm('nombre','','R','apellido','','R','profesion','','R','email','','NisEmail','telefonos','','R','direccion','','R');return document.MM_returnValue;
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
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' Es REQUERIDO...\n'; }
  } if (errors) alert('Complete los Siguientes Campos\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
</head>

<body>
<table width="840" border="0" align="center" bgcolor="#000000">
  <tr>
    <td width="830"><form action="../cod_mant/cod_man_catedratico.php" method="post" name="formulario" id="formulario" onsubmit="return validar();">
      <table width="833" border="0" align="center" bgcolor="#FFFFFF">
        <tr>
          <td valign="top">&nbsp;</td>
          <td><img src="../../images/fond1.jpg" width="830" height="150" /></td>
        </tr>
        <tr>
          <td width="10" valign="top"><label><br />
            <br />
            <br />
            <a href="../../conexion.php"></a><br />
          </label></td>
          <td width="813"><div align="right">
            <table width="353" border="0">
              <tr>
                <td width="24">&nbsp;</td>
                <td width="24">&nbsp;</td>
                <td width="24">&nbsp;</td>
                <td width="172"><img src="../../images/iconos/84.ico" /> <a href="../index.php" class="text2">Mantenimiento</a></td>
                <td width="87"><div align="right"><img src="../../images/iconos/chat-home.ico" class="text1" /><span class="text1 Estilo6"><a href="../../index.php">Principal</a></span></div></td>
              </tr>
            </table>
          </div>
            <table width="815" border="0">
              <tr>
                <td bgcolor="#4682B4"><div class="title">Modificaci&oacute;n de Datos del Catedr&aacute;tico </div></td>
              </tr>
              <tr>
                <td bgcolor="#F3F3F3"><table width="645" border="0" align="center">
                  <tr>
                    <td width="3" class="text1">&nbsp;</td>
                    <td width="150"><div align="right" class="text1"> Nombres: </div></td>
                    <td width="478"><label>
                      <input name="nombre" type="text" id="nombre" size="60" autocomplete="off" value="<?php echo $arreglo['nombre_catedratico']; ?>"  />
                    </label></td>
                  </tr>
                  <tr>
                    <td class="text1">&nbsp;</td>
                    <td class="text1"><div align="right">Apellidos:</div></td>
                    <td><label>
                      <input name="apellido" type="text" id="apellido" aurotomplete="off" value="<?php echo $arreglo['apellido']; ?>"  size="60"  autocomplete="off" />
                    </label></td>
                  </tr>
                  <tr>
                    <td class="text1">&nbsp;</td>
                    <td class="text1"><div align="right">Profesi&oacute;n:</div></td>
                    <td><label>
                      <input name="profesion" type="text" id="profesion"  autocomplete="off" value="<?php echo $arreglo['profesion']; ?>"  size="60" />
                    </label></td>
                  </tr>
                  <tr>
                    <td class="text1">&nbsp;</td>
                    <td class="text1"><div align="right">Correo Electronico: </div></td>
                    <td><label>
                      <input name="email" type="text" id="email" value="<?php echo $arreglo['email']; ?>"  size="60" autocomplete="off" />
                    </label></td>
                  </tr>
                  <tr>
                    <td class="text1">&nbsp;</td>
                    <td class="text1"><div align="right">Tel&eacute;fonos:</div></td>
                    <td><label>
                      <input name="telefonos" type="text" id="telefonos" value="<?php echo $arreglo['telefono']; ?>" autocomplete="off" />
                    </label></td>
                  </tr>
                  <tr>
                    <td class="text1">&nbsp;</td>
                    <td class="text1"><div align="right">Direcci&oacute;n:</div></td>
                    <td><label>
                      <input name="direccion" type="text" id="direccion" size="60" value="<?php echo $arreglo['direccion']; ?>" autocomplete="off"  />
                    </label></td>
                  </tr>
                  <tr>
                    <td class="text1">&nbsp;</td>
                    <td class="text1"><div align="right">Observaci&oacute;n:</div></td>
                    <td><label>
                      <textarea name="observacion" cols="45" id="observacion"  autocomplete="off"><?php echo $arreglo['observacion']; ?></textarea>
                    </label></td>
                  </tr>
                  <tr>
                    <td class="text1">&nbsp;</td>
                    <td class="text1"><input name="id_catedratico" type="hidden" value="<?php echo $arreglo['id_catedratico']; ?>" id="id_catedratico" /></td>
                    <td><table width="290" border="0">
                        <tr>
                          <td></td>
                          <td><label>
                            <input type="submit" name="Submit2" value="Guardar">
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
            </td>
        </tr>
      </table>
    </form>
    </td>
  </tr>
</table>
</body>
</html>
<script language="JavaScript" type="text/javascript">
document.formulario.nombre.focus();
</script>


<script language="JavaScript" type="text/javascript">
function alerta(){
return window.confirm("¿Seguro que desea Realizar la Acción...?");}
</script>
