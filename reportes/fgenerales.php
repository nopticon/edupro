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
		encabezado('Ingreso de Notas'); ?>
		<div id="content2">
		<div class="title">Cuadros Generales de Calificaciones</div>
	</div>
	
	<div class="blue">
		<form action="fgenerales2.php" method="post" name="formulario" id="formulario" target="_blank">
		
		<table width="98%" border="0" align="center">
			<tr>
				<td width="25%" align="right">Grado:</td>
				<td width="75%"><select name="seccion" id="seccion">
					<?php
					
					$seleccionar = "SELECT *
						FROM grado g, secciones s
						WHERE g.id_grado = s.id_grado
							AND status = 'Alta'";
					$ejecutar = mysql_query($seleccionar);
					
					while ($arreglo = mysql_fetch_array($ejecutar))
					{
						echo '<option value="' . $arreglo['id_seccion'] . '" >' . $arreglo['nombre']. ' - secci&oacute;n: ' .$arreglo['nombre_seccion'] .'</option>';
					}
					
					?>
				</select></td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td align="right">Tiempo de Examen:</td>
				<td><select name="examen">
					<?php
					
					$seleccionar = "SELECT * FROM examenes";
					$ejecutar = mysql_query($seleccionar);
					
					while ($arreglo = mysql_fetch_array($ejecutar))
					{
						echo '<option value="' . $arreglo['id_examen'] . '" >' . $arreglo['examen'] . '</option>';
					}
					
					?>
				</select></td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td align="right">A&ntilde;o</td>
				<td><select name="anio">
				  <?php
				  
				  for ($i_year = date('Y'); $i_year >= 2010; $i_year--)
				  {
						echo '<option value="' . $i_year . '">' . $i_year . '</option>';
					}
					
					?>
				</select></td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="Submit2" value="Visualizar" /></td>
			</tr>
		</table>
		
		</form>
	</div>
</div>
</div>
</body>
</html>