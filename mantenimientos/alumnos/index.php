<div id="content" class="float-holder">
<?php
$toproot = '../../';
require_once('../../conexion.php');
?>
<div id="boton1"><a href="../../index.php"><img src="../../images/inicio.png" border=0; /></a></div>
<div id="boton2"><img src="../../images/menu.png" /></div>
<div id="boton4"><img src="../../images/info.jpg" /></div>
<div id="userlog"><?php $nombre = $_SESSION['nombre'];
	echo "Bienvenido; ".$nombre; ?></div>
<div id="boton3"><a href="../../exit.php"><img src="../../images/exit.png" /></a></div>

		<?php include('../../menu.php'); 
		encabezado('Mantenimiento de Alumnos', '../');?>
		
        <div id="content2">
		<div class="title">Mantenimiento de alumnos</div>
	</div>
	
	<div class="blue">
		<form action="alumno.php" method="get" name="formulario" id="formulario" onsubmit="MM_validateForm('carne','','R');return document.MM_returnValue">
        <br /><br /><br />
		<table width="520" border="0" align="center">
			<tr>
				
		  <tr>
                            
                              <td width="239" class="text1"><div align="right">Carn&eacute;:
                                <input name="carne" type="text" id="textred" size="20"  autocomplete="off" /> 
            </div></td>
                              <td width="244" class="text1"><div align="left">
                                
            <input name="submit" type="image" src="../../images/buscar2.png" title="Buscar por carné..."  /></div></td>
          </tr>
                           
                                </table>
				        <br /><br /><br />
        </form>

	</div>
</div>

<script type="text/javascript">
document.formulario.carne.focus();

function alerta()
{
	return window.confirm("�Seguro que desea Realizar la Acci�n...?");
}

function buscar(url)
{
	ventana = open(url,"ventana","scrollbars=yes,status=no,toolbar=no,directories=no,menubar=no,resizable=yes,width=350,height=425");
}

</script>
<?php include('../../menucss.php'); ?>
</body>
</html>