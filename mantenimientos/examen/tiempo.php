<?php

require_once('../../conexion.php');

$id_examen = $_GET['id_examen'];

$seleccionar = "SELECT * FROM examenes WHERE id_examen = '$id_examen'";
$ejecutar = mysql_query($seleccionar);

if ($arreglo = mysql_fetch_assoc($ejecutar))
{
	
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ingreso de Tiempo para Examenes</title>
<link rel="stylesheet" type="text/css" href="../../style.css"  />

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
    <td width="830"><form action="../cod_mant/cod_man_examen.php" method="post" name="formulario" id="formulario" onsubmit="return validar()">
      <table width="833" border="0" align="center" bgcolor="#FFFFFF">
        <tr>
          <td width="10" bgcolor="#FFFFFF">&nbsp;</td>
          <td width="813" bgcolor="#FFFFFF"><table width="811" border="0" align="center">
            <tr>
              <td><img src="../../images/fond1.jpg" width="830" height="150" /></td>
            </tr>
            <tr>
              <td><div align="right">
                  <table width="353" border="0">
                    <tr>
                      <td width="24">&nbsp;</td>
                      <td width="24">&nbsp;</td>
                      <td width="24">&nbsp;</td>
                      <td width="172">&nbsp;</td>
                      <td width="87"><div align="right"><img src="../../images/iconos/chat-home.ico" class="text1" /><span class="text1 Estilo6"><a href="../../index.php">Principal</a></span></div></td>
                    </tr>
                  </table>
              </div></td>
            </tr>
            <tr>
              <td width="789" bgcolor="#4682B4"><div class="title"> Ingreso de Tiempo para Examenes </div></td>
            </tr>
            <tr>
              <td bgcolor="#F3F3F3"><table width="645" border="0" align="left">
                  <tr>
                    <td width="10" class="text1">&nbsp;</td>
                    <td width="183"><div align="right" class="text1">
                        <p>Tiempo para Examen:<br />
                            <span class="tex2 Estilo7 Estilo8"><span class="Estilo7">ej: </span></span></p>
                    </div></td>
                    <td width="438"><label>
                      <input name="examen" type="text" id="examen" size="60" autocomplete="off" value="<?php echo $arreglo['examen']; ?>"  />
                      <br />
                      <span class="tex2 Estilo7">ej: 1er Bimestre | Primer Bimestre | 1er Trimestre | etc. </span></label></td>
                  </tr>
                  <tr>
                    <td class="text1">&nbsp;</td>
                    <td class="text1"><div align="right">Observaci&oacute;n:</div></td>
                    <td><label>
                      <textarea name="observacion" cols="45" id="observacion" ><?php echo $arreglo['observacion']; ?></textarea>
                      </label>
                        <label class="tex2 Estilo7"></label></td>
                  </tr>
                  <tr>
                    <td class="text1">&nbsp;</td>
                    <td class="text1"><div align="right">Status:</div></td>
                    <td><label>
                      <select name="status" id="status" >
                        <option value="Alta">Alta</option>
                        <option value="Baja">Baja</option>
                      </select>
                    </label></td>
                  </tr>
                  <tr>
                    <td class="text1">&nbsp;</td>
                    <td class="text1"><input name="id_examen" type="hidden" id="id_examen" value="<?php echo $arreglo['id_examen']; ?>" /></td>
                    <td><table width="290" border="0">
                        <tr>
                          <td></td>
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
                    <td bgcolor="#999999"><div align="center" class="Estilo4">Visualizaci&oacute;n de Tiempos </div></td>
                  </tr>
                  <tr>
                    <td bgcolor="#4682B4"><table width="805" border="0">
                        <tr>
                          <td width="10">&nbsp;</td>
                          <td width="528" class="text1"><div align="center" class="Estilo4">Tiempo de Examenes </div></td>
                          <td width="100"><div align="center" class="text1 Estilo4">Fecha de Alta </div></td>
                          <td width="149"><div align="center" class="Estilo5">Status</div></td>
                        </tr>
                    </table></td>
                  </tr>
                </table>
              <iframe src="examenes1.php" width="100%" height="200" align="center"><br />
                <br />
            </iframe></td>
        </tr>
      </table>
    </form>
    </td>
  </tr>
</table>
</body>
</html>
<script language="JavaScript" type="text/javascript">
document.formulario.grado.focus();
</script>


<script language="JavaScript" type="text/javascript">

function validar(){
if(!confirm("Seguro que Desea Guardar el Nuevo Tiempo de Examen?")){
return false;
}
MM_validateForm('examen','','R');return document.MM_returnValue;
}
</script>


