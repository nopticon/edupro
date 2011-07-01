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
		encabezado('Re-Inscripci&oacute;n de Alumnos');?>

		<div id="content2">	
		<div class="title">Re-Inscripci&oacute;n de Alumnos</div>
	</div>
	
	<div class="blue">
	
	<form action="reinscripcion.php" method="get" name="formulario" id="formulario" onsubmit="MM_validateForm('carne','','R');return document.MM_returnValue">
	
		<div class="blue">
			<table width="520" border="0" align="center">
				<tr><br /><br />
					<td width="285" align="right">Carn&eacute;: 
				  <input name="carne" type="text" id="textred" aurotomplete="off" size="20" /></td>
				  <td width="225"><input name="submit" type="image" src="../images/buscar2.png" title="Buscar Alumno por Carne" /></td>
				
              </tr>
			</table>
			
			<br /><br /><br />
			
			
		</div>
		
		<div class="title">Visualizaci&oacute;n de &Uacute;ltimas Re-Inscripciones</div>
		
		<div class="bck">
		<table width="100%" class="table">
			<tr class="title2">
				<td width="15%" align="center">Fecha</td>
				<td width="15%" align="center">Carn&eacute;</td>
				<td width="35%" align="center">Nombres y Apellidos</td>
				<td width="35%" align="center">Grado</td>
			</tr>
			<?php

			$anio = date('Y');
			$status = 'ReInscrito';
			
			$sql = "SELECT r.fecha_reinscripcion, a.carne, a.nombre_alumno, a.apellido, g.nombre, s.nombre_seccion, a.sexo
				FROM reinscripcion r, alumno a, grado g, secciones s
				WHERE r.id_alumno = a.id_alumno
				AND r.id_grado = g.id_grado
				AND s.id_seccion = r.id_seccion
				AND anio = '$anio' 
				AND r.status = '$status' ORDER BY r.id_reinscripcion DESC LIMIT 50";
			$ejecutar = mysql_query($sql);

			while ($arreglo = mysql_fetch_assoc($ejecutar))
			{
			
			?>
			<tr>
				<td width="15%" align="center" class="text2">
				
				<?php if($arreglo['sexo']=='F'){ ?>		
                <div class="textpink"><?php echo $arreglo['fecha_reinscripcion']; ?></div>
               <?php } else { ?>
               <div class="textblue"><?php echo $arreglo['fecha_reinscripcion']; ?></div>
               <?php } ?>
               
				</td>
				<td width="15%" class="text2">
				
				<?php if($arreglo['sexo']=='F'){ ?>		
                <div class="textpink"><?php echo $arreglo['carne']; ?></div>
               <?php } else { ?>
               <div class="textblue"><?php echo $arreglo['carne']; ?></div>
               <?php } ?>
               
				</td>
				<td width="35%">
					
            	<?php if($arreglo['sexo']=='F'){
				?>			
                <div class="textpink"><?php echo $arreglo['nombre_alumno'] . ', ' . $arreglo['apellido']; ?></div>
               <?php } else { ?>
               <div class="textblue"><?php echo $arreglo['nombre_alumno'] . ', ' . $arreglo['apellido']; ?></div>
               <?php } ?>
               </td>
               
				<td width="35%" class="text2">
					
				<?php if($arreglo['sexo']=='F'){ ?>
                <div class="textpink"><?php echo $arreglo['nombre'] .' Secci&oacute;n '. $arreglo['nombre_seccion']; ?></div>
               <?php } else { ?>
               <div class="textblue"><?php echo $arreglo['nombre'] .' Secci&oacute;n '. $arreglo['nombre_seccion']; ?></div>
               <?php } ?>
               
					</td>
			</tr>
			<?php

			}

			?>
		</table>
		</div>
	</form>
	
	</div>
</div>

<script type="text/javascript">
//<![CDATA[
document.formulario.carne.focus();
//]]>
</script>
<?php include('../menucss.php'); ?>
</body>
</html>