<?php

require_once('../conexion.php');

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ingreso de Grados y Secciones</title>
<link rel="stylesheet" type="text/css" href="../style.css" />

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
        <td width="830"><form action="cod_secciones.php" method="post" name="formulario" id="formulario" onsubmit="return validar();">
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
                              <td width="172">&nbsp;</td>
                              <td width="87"><div align="right"><img src="../images/iconos/chat-home.ico" class="text1" /><span class="text1 Estilo6"><a href="../index.php">Principal</a></span></div></td>
                            </tr>
                          </table>
                      </div></td>
                    </tr>
                    <tr>
                      <td width="789" bgcolor="#4682B4"><div class="title">Modulo de Ingreso de Secciones </div></td>
                    </tr>
                    <tr>
                      <td bgcolor="#E0EBF3"><table width="645" border="0" align="left">
                          
                          <tr>
                            <td class="text1">&nbsp;</td>
                            <td class="text1"><div align="right">Grado:</div></td>
                            <td><?php
                        
                        $seleccionar = "SELECT * FROM grado WHERE status = 'Alta'";
                        $ejecutar = mysql_query($seleccionar);
                        
                        echo '<select name="grado" >';
                        
                        //echo '<option value="0">Seleccione </option>';
                        //por cada registro encontrado en la tabla me genera un <option>
                        while ($arreglo = mysql_fetch_array($ejecutar))
                        {
                        	echo '<option value="' . $arreglo['id_grado'] . '" >' . $arreglo['nombre'], $arreglo['seccion'] . '</option>';
                        }
                        
                        echo '</select>';
                        
                        ?></td>
                          </tr>
                          <tr>
                            <td width="10" class="text1">&nbsp;</td>
                            <td width="183" class="text1"><div align="right" class="text1">Secci&oacute;n:</div></td>
                            <td width="438"><label>
                              <input name="seccion" type="text" id="seccion" autocomplete="off" />
                            </label></td>
                          </tr>
                          <tr>
                            <td class="text1">&nbsp;</td>
                            <td class="text1">&nbsp;</td>
                            <td><table width="290" border="0">
                                <tr>
                                  <td></td>
                                  <td><label>
                                    <div align="right">
                                      <input type="submit" name="Submit2" value="Guardar" />
                                      </div>
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
                    <p><br />
                    </p>
                    <table width="777" border="0">
                      <tr>
                        <td width="102">
						<?php 
						$seleccionar = "SELECT nombre, nombre_seccion FROM secciones s, grado g where g.id_grado = s.id_grado AND g.status = 'Alta'";
						$ejecutar = mysql_query($seleccionar);
						
						while($arreglo = mysql_fetch_assoc($ejecutar))
						{
						?></td><tr>
                        <td width="188"><?php echo $arreglo['nombre']; ?></td>
                        <td width="210"><?php echo $arreglo['nombre_seccion']; ?></td>
                        <td width="259"><?php }?></td>
                      </tr>
                    </table>
                    <p>&nbsp;</p>
                    <p>&nbsp; </p></td>
              </tr>
            </table>
        </form></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<script language="JavaScript" type="text/javascript">
document.formulario.seccion.focus();
</script>


<script language="JavaScript" type="text/javascript">

function validar(){
if(!confirm("Seguro que Desea Guardar el Grado y Seccion?")){
return false;
}
MM_validateForm('grado','','R','seccion','','R');return document.MM_returnValue;
}
</script>


