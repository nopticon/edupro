<div id="content" class="float-holder">
<?php
require_once('../conexion.php');
?>

<div id="boton1"><a href="../index.php"><img src="../images/inicio.png" border=0; /></a></div>
<div id="boton2"><img src="../images/menu.png" /></div>
<div id="boton4"><img src="../images/info.jpg" /></div>
<div id="userlog"><?php $nombre = $_SESSION['nombre'];
	echo "Bienvenido; ".$nombre; ?></div>
<div id="boton3"><a href="../exit.php"><img src="../images/exit.png" /></a></div>

	    <?php include('../menu.php'); 
		encabezado('Mantenimiento del Sistema');?>

		<div id="content2">
		<div class="title">Mantenimiento del Sistema</div>
		
<form action="../historial/historial.php" method="get" name="formulario" id="formulario" onsubmit="MM_validateForm('carne','','R');return document.MM_returnValue">
           <table width="781" border="0" align="center">
                              <tr>
                                <td width="262"><div align="right"><img src="../images/iconos/59.ico" /></div></td>
                                <td width="475" class="text1"><a href="alumnos/index.php">Alumnos</a></td>
                                <td width="30">&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td class="text1">&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><div align="right"><img src="../images/iconos/106.ico" /></div></td>
                                <td class="text1"><a href="grados.php">Grados</a></td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td class="text1">&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><div align="right"><img src="../images/iconos/166.ico" /></div></td>
                                <td class="text1"><a href="cursos/cursos.php">Cursos</a></td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td class="text1">&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><div align="right"><img src="../images/iconos/209.ico" /></div></td>
                                <td class="text1"><a href="catedraticos/index.php">Catedr&aacute;ticos</a></td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td class="text1">&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><div align="right"><img src="../images/iconos/292.ico" /></div></td>
                                <td class="text1"><a href="examen/index.php">Rango de Tiempo para Examenes</a></td>
                                <td>&nbsp;</td>
                              </tr>
                            </table>  
        </form>
        
<?php include('../menucss.php'); ?>
</body>
</html>

<script language="JavaScript" type="text/javascript">

function buscar(url) {  
ventana = open(url,"ventana","scrollbars=yes,status=no,toolbar=no,directories=no,menubar=no,resizable=yes,width=350,height=425")  
}  
</script>
