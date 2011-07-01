<?php
if (!isset($toproot))
{
	$toproot = '../';
}

?>
<script type="text/javascript"> 
	$(document).ready(function(){
	$(function() {
                $('#navigation a').stop().animate({'marginLeft':'-150px'},1000);

                $('#navigation > li').hover(
                    function () {
                        $('a',$(this)).stop().animate({'marginLeft':'-2px'},200);
                    },
                    function () {
                        $('a',$(this)).stop().animate({'marginLeft':'-150px'},200);
                    }
                );
            });
   });
	
</script>
    <ul id="navigation">
		<li class="home"><a href="<?php echo $toproot; ?>alumnos/index.php" title="Inscripci&oacute;n de Nuevo Alumno">  </a></li>
		<li class="about"><a href="<?php echo $toproot; ?>reinscripcion/index.php" title="Re-Inscripci&oacute;n de Alumno Existente">  </a></li>
		<li class="notas"><a href="<?php echo $toproot; ?>notas/index.php" title="Visualizaci&oacute;n de Notas">  </a></li>
		<li class="historial"><a href="<?php echo $toproot; ?>historial/index.php" title="Record Acad&eacute;mico del Alumno">  </a></li>
		<li class="reporte"><a href="<?php echo $toproot; ?>reportes/index.php" title="Visualizaci&oacute;n de Reportes Varios">  </a></li>
		<li><a href="<?php echo $toproot; ?>faltas/index.php" title="Visualizaci&oacute;n de Faltas / Ingreso de Faltas Acad&eacute;micas">Faltas acad&eacute;micas</a></li>
		<li><a href="<?php echo $toproot; ?>codigo_alumno/index.php" title="Ingreso de Codigo / Matricula del Alumno">Codigos de alumnos</a></li>
		<li><a href="<?php echo $toproot; ?>ocupacional/index.php" title="Ingreso de Areas Ocupacionales para Alumnos">Cursos ocupacionales</a></li>
		<li><a href="<?php echo $toproot; ?>mantenimientos/alumnos/">Modificaci&oacute;n de alumnos</a></li>
		
		<?php	if (isset($_SESSION['userlog']) && ($_SESSION['userlog'] == 'Director'))
		{
		?>
		<li><a href="<?php echo $toproot; ?>ingreso_index.php" title="Ingreso de datos">Ingreso de datos</a></li>
		<li><a href="<?php echo $toproot; ?>editar/index.php" title="Edicion de notas">Edicion de notas</a></li>
		<li><a href="<?php echo $toproot; ?>mantenimientos/index.php" title="Mantenimientos">Mantenimientos</a></li>
		<?php } ?>
		
		
	</ul>
</div>