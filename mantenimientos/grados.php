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


<link rel="stylesheet" type="text/css" href="../style.css"  />
<?php
		include('../menu.php'); 
		encabezado('Mantenimiento de Grado');
		?>
		<div id="content2">        
        <div class="title">Mantenimiento de Grado</div>

<table border="0" align="center">
  <tr>
    <td><form action="../historial/historial.php" method="get" name="formulario" id="formulario" onsubmit="MM_validateForm('carne','','R');return document.MM_returnValue">
      <table border="0" align="center">
        <tr>
          <td valign="top">&nbsp;</td>
          <td></td>
        </tr>
        <tr>
          <td width="8" valign="top"><label><br />
                <br />
                <br />
                <a href="../conexion.php"></a><br />
          </label></td>
          <td ><div align="right">
              
          </div>
              <table  align="center">
               <tr >
                  <td ><br />
                      <table width="91%" border="0">
                        <tr>
                          <td width="392"><div align="center" class="textred">Nombre del Grado </div></td>
                          <td width="23">&nbsp;</td>
                          <td width="71" class="textred"><div align="center">Modificar</div></td>
                        </tr>
                      </table>
                    <?php 
				  
				  $seleccionar = "SELECT * FROM grado";
				  $ejecutar = mysql_query($seleccionar);
				  
				  while($arreglo = mysql_fetch_assoc($ejecutar))
				  {				  
				  ?>
                    <br />
                      <table width="453" border="0">
                        <tr>
                          <td width="382">
                          <div align="center" class="textblack"><a href="mod_grados.php?id_grado=<?php echo $arreglo['id_grado']; ?>"><?php echo $arreglo['nombre']; ?></a>                          </div></td>
                          <td width="71"><div align="center" class="text1"><a href="mod_grados.php?id_grado=<?php echo $arreglo['id_grado']; ?>"><img src="../images/iconos/104.ico" border="0" /></a></a></div></td>
                        </tr>
                      </table>
                    <?php }?>
                    <br />
                      <br />
                      <br />
                      <div align="center"></div></td>
                </tr>
              </table>
            </td>
        </tr>
      </table>
    </form>
    </td>
  </tr>
</table></div></div>
<?php include('../menucss.php');?>
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
