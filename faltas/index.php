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
		encabezado('Faltas Acad&eacute;micas');?>
        
		<div id="content2">
		<div class="title">Faltas Acad&eacute;micas</div>
	</div>
	
	<div class="blue">
	<br />
	<br />
    <?php 
	if(!empty($_SESSION['guardar'])){
{ ?>
	<div id="textred" align="center">
	<img src="../images/falta1.png" />
	<?php echo "Falta guardada con &Eacute;xito. " ?></div> 
	<?php } 	}
	unset($_SESSION['guardar']);
	?>
	<br />
	<br />
	<table width="100%" border="0">
      <tr>
        <td width="36%">
        <form action="faltas.php" method="get" name="formulario1" id="formulario1"  >
    <table width="86%">
    <tr>
    <td width="18%" aling="right">&nbsp;</td>
     <td width="61%"><div align="right">Ingresar Falta para alumno:<br />
         <input name="carne" type="text" id="textred" aurotomplete="off" size="25"  autocomplete="off"  /></div></td>
    <td width="21%" aling="left">
	      <input name="submit" type="image" src="../images/buscar2.png" title="Buscar por carn&eacute;..."  />
      <br />      </td></tr>
       </table>	
	</form>
        </td>
        <td width="30%">
  <div class="a_center">
		    <img src="../images/list.png" class="text1" /> <a href="faltas_alumnos.php">Ver faltas acad&eacute;micas de alumno</a>
		</div>
        </td>
        <td width="34%">
        <form action="faltas2.php" method="get" name="formulario2" id="formulario" onsubmit="return validarfalta1()" target="_blank" >
    <table width="328">
    <tr>
    <td width="61%" aling="right"><div align="right">Ver Faltas por alumno <br />
        <input name="carne1" type="text" id="textred" aurotomplete="off" size="25" />
    </div></td>
     <td width="32%"><input name="submit2" type="image" src="../images/buscar2.png" title="Buscar por carn&eacute;..."  /></td>
    <td width="7%" aling="left">&nbsp;</td>
    </tr>
       </table>	
	</form>
        </td>
      </tr>
    </table>
	<br />
	
	  <br />
	  <br />
	  <br /><br />
	</div>


<script type="text/javascript">
//<![CDATA[
document.formulario.carne.focus();

function buscar(url) {
	ventana = open(url,"ventana","scrollbars=yes,status=no,toolbar=no,directories=no,menubar=no,resizable=yes,width=350,height=425")  
}
//]]>
</script>
<?php include('../menucss.php'); ?>
</body>
</html>