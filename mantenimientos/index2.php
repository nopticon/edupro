<?php

require_once('../conexion.php');

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Modulo de Mantenimiento</title>
<link rel="stylesheet" type="text/css" href="../style.css"  />

<style type="text/css">
<!--
.Estilo7 {color: #FF0000}
-->
</style>
</head>

<body>
<table width="200" border="0" align="center" bgcolor="#000000">
  <tr>
    <td><table width="840" border="0" align="center" bgcolor="#FFFFFF">
      <tr>
        <td width="830"><form action="../historial/historial.php" method="get" name="formulario" id="formulario" onsubmit="MM_validateForm('carne','','R');return document.MM_returnValue">
            <table width="833" border="0" align="center">
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
                        <td width="10">&nbsp;</td>
                        <td width="153">&nbsp;</td>
                        <td width="57">&nbsp;</td>
                        <td width="87"><div align="right"><img src="../images/iconos/chat-home.ico" class="text1" /><span class="text1 Estilo6"><a href="../index.php">Principal</a></span></div></td>
                      </tr>
                    </table>
                </div>
                    <table width="821" align="center">
                      <tr>
                        <td width="806" bgcolor="#4682B4"><div class="title">Modulo de Mantenimiento del Sistema </div></td>
                      </tr>
                      <tr bgcolor="#F3F3F3">
                        <td bordercolor="#000000" bgcolor="#F3F3F3"><div align="center" class="Estilo4 Estilo7"><br />
                          La Modificacion se Realizo con &Eacute;xito... <br />
                          <br />
                        </div>
                            <table width="781" border="0" align="center">
                              <tr>
                                <td width="267"><div align="right"><img src="../images/iconos/59.ico" /></div></td>
                                <td width="470" class="text2"><a href="alumnos/index.php">Alumnos</a></td>
                                <td width="30">&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td class="text2">&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><div align="right"><img src="../images/iconos/106.ico" /></div></td>
                                <td class="text2"><a href="grados.php">Grados</a></td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td class="text2">&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><div align="right"><img src="../images/iconos/166.ico" /></div></td>
                                <td class="text2"><a href="cursos/cursos.php">Cursos</a></td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td class="text2">&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><div align="right"><img src="../images/iconos/209.ico" /></div></td>
                                <td class="text2"><a href="catedraticos/index.php">Catedr&aacute;ticos</a></td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td class="text2">&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><div align="right"><img src="../images/iconos/292.ico" /></div></td>
                                <td class="text2"><a href="examen/index.php">Rango de Tiempo para Examenes</a></td>
                                <td>&nbsp;</td>
                              </tr>
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
                        <td width="810"><div align="center"><span class="Estilo10">Visualizaci&oacute;n de  - </span></div></td>
                      </tr>
                  </table></td>
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

function buscar(url) {  
ventana = open(url,"ventana","scrollbars=yes,status=no,toolbar=no,directories=no,menubar=no,resizable=yes,width=350,height=425")  
}  
</script>
