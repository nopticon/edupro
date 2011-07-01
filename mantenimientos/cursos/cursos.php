<?php

require_once('../../conexion.php');

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Modulo de Mantenimiento de Grado</title>
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
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' es Requerido.\n'; }
  } if (errors) alert('Complete los Siguientes Campos:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
</head>

<body>
<table width="840" border="0" align="center" bgcolor="#000000">
  <tr>
    <td width="830"><form action="cursos1.php" method="get" name="formulario" id="formulario" onsubmit="MM_validateForm('carne','','R');return document.MM_returnValue">
      <table width="833" border="0" align="center" bgcolor="#FFFFFF">
        <tr>
          <td valign="top">&nbsp;</td>
          <td><img src="../../images/fond1.jpg" width="830" height="150" /></td>
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
                <td width="172"><img src="../../images/iconos/84.ico" /> <a href="../index.php">Mantenimiento</a></td>
                <td width="87"><div align="right"><img src="../../images/iconos/chat-home.ico" class="text1" /><span class="text1 Estilo6"><a href="../../index.php">Principal</a></span></div></td>
              </tr>
            </table>
           
          </div>
            <table width="821" align="center">
              
              
              <tr>
                <td bgcolor="#F3F3F3"><table width="807" border="0">
                  <tr>
                    <td width="176">&nbsp;</td>
                    <td width="601">&nbsp;</td>
                    <td width="16">&nbsp;</td>
                  </tr>
                  <tr>
                    <td><div align="right" class="text1"> Seleccionar el Grado:</div></td>
                    <td><?php 
			  $seleccionar = "SELECT * FROM grado WHERE status = 'Alta'";
			  $ejecutar = mysql_query($seleccionar);
			  	echo '<select name="grado" >';
				echo '<option value="0">Seleccione </option>';
				//por cada registro encontrado en la tabla me genera un <option>
 					 while ($arreglo = mysql_fetch_array($ejecutar)){
  					  echo '<option value="' . $arreglo['id_grado'] . '" >' . $arreglo['nombre'],$arreglo['seccion'] . '</option>'; 

							  }

								echo '</select>'; 
                ?>
                      <input type="submit" name="Submit" value="Ir..." /></td>
                    <td><label></label></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
            </table>
            <table width="821" align="center">
              <tr>
                <td width="806" bgcolor="#4682B4"><div align="center" class="Estilo5">Modulo de Mantenimiento de Grado </div></td>
                </tr>
              <tr bgcolor="#F3F3F3">
                <td bordercolor="#000000" bgcolor="#F3F3F3"><br />
                  <iframe src="mostrar_cursos.php" align="center" width="800" height="400"></iframe></td>
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
document.formulario.carne.focus();
</script>


<script language="JavaScript" type="text/javascript">

function buscar(url) {  
ventana = open(url,"ventana","scrollbars=yes,status=no,toolbar=no,directories=no,menubar=no,resizable=yes,width=350,height=425")  
}  
</script>
