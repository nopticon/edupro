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


	<div id="content2">
		<?php include('../menu.php'); 
		encabezado('Inscripci&oacute;n | Re-Inscripci&oacute;n'); ?>
		
		<div class="title">Alumno Ingresado con &Eacute;xito</div>
		<br /><br/><br />
		<table width="100%" border="0">
			<tr>
				<td width="276">&nbsp;</td>
				<td width="125">&nbsp;</td>
				<td width="109">&nbsp;</td>
				<td width="145"><div align="center"><img src="../images/inscripcion.png" /> <a href="index.php" >Nueva Inscripci&oacute;n</a> </div></td>
				<td width="131"><div align="center"><img src="../images/reinscripcion.png" /> <a href="../reinscripcion/index.php">Re-Inscripci&oacute;n</a></div></td>
			</tr>
		</table>

		<div class="title">Visualizaci&oacute;n de alumnos nuevos</div>
		
		
			<table width="100%" class="table">
				<tr class="title2">
					<td width="10%" align="center">Carn&eacute;</td>
					<td width="10%" align="center">Fecha</td>
					<td width="40%" align="center">Nombres</td>
					<td width="10%" align="center">Compromiso de Estudios</td>
					<td width="20%" align="center">Grado</td>
					<td width="10%" align="center">Editar</td>
				</tr>
			<?php

			$seleccionar = 'SELECT *
				FROM alumno a, reinscripcion r, grado g, secciones s
				WHERE a.id_alumno = r.id_alumno
					AND r.id_grado = g.id_grado
					AND r.id_seccion = s.id_seccion
					AND r.anio = ' . date('Y') . '
				ORDER BY a.id_alumno DESC LIMIT 100' ;
			$ejecutar = mysql_query($seleccionar);

			while($arreglo = mysql_fetch_assoc($ejecutar))
			{
			?>
				<tr>
					<td class="text2">					
				<?php if($arreglo['sexo']=='F'){ ?>		
                <div class="textpink"><?php echo $arreglo['carne']; ?></div>
               <?php } else { ?>
               <div class="textblue"><?php echo $arreglo['carne']; ?></div>
               <?php } ?>					
					</td>
					<td class="text2" align="center">
				<?php if($arreglo['sexo']=='F'){ ?>		
                <div class="textpink"><?php echo $arreglo['fecha']; ?></div>
               <?php } else { ?>
               <div class="textblue"><?php echo $arreglo['fecha']; ?></div>
               <?php } ?>
					</td>
					<td>
				<?php if($arreglo['sexo']=='F'){ ?>		
                <div class="textpink"><?php echo $arreglo['apellido'] . ', ' . $arreglo['nombre_alumno']; ?></div>
               <?php } else { ?>
               <div class="textblue"><?php echo $arreglo['apellido'] . ', ' . $arreglo['nombre_alumno']; ?></div>
               <?php } ?>
					</td>
					<td align="center">
						<a href="../reportes/compromiso.php?id_alumno=<?php echo $arreglo['id_alumno']; ?>" target="_blank"><img src="../images/printer.png" width="20" border="0" /></a> <a href="../reportes/compromiso2.php?id_alumno=<?php echo $arreglo['id_alumno']; ?>" target="_blank"><img src="../images/printer.png" width="20" border="0" /></a></td>
					<td>
				<?php if($arreglo['sexo']=='F'){ ?>		
                <div class="textpink"><?php echo $arreglo['nombre'] . ' ' . $arreglo['nombre_seccion']; ?></div>
               <?php } else { ?>
               <div class="textblue"><?php echo $arreglo['nombre'] . ' ' . $arreglo['nombre_seccion']; ?></div>
               <?php } ?>
					</td>
					<td align="center">
						<a href="../mantenimientos/alumnos/alumno.php?carne=<?php echo $arreglo['carne']; ?>&amp;Submit2=Buscar" ><img src="../images/configuration.png" width="20" border="0" /></a></td>
				</tr>
			<?php
			}
			?>
			</table>
		
	</div>
</div>
</body>
</html>