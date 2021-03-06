<?php
require "controladores/ControladorEstandar.php";

$controlador = new ControladorEstandar();
$variables = $controlador->inicio();

ob_start();
?>
<section>
    <div class="col-sm-4"><img src="img/logo.png" class="img-responsive"></div>
    <div class="col-sm-8">
        <h3>Bienvenido a <strong>Apuntea</strong></h3>
        <h3 class="text-center">Tu red social para compartir apuntes.</h3>
    </div>
    <div class="clearfix"></div>
</section>
<ul class="breadcrumb">
    <li><a href="index.php">Apuntea</a></li>
    <li>Inicio</li>
</ul>
<hr>
<section>
    <p>
        En <strong>apuntea.com</strong> podrás encontrar todos los apuntes que necesites
        de una manera completamente social. Como usuario no registrado no podrás
        acceder a cierto contenido de la página y no podrás pedir permisos de visualización
        de aquellos apuntes que sean privados. Pulsa <a href="registrarse.php">aqui para registrarte</a>
    </p>
</section>
<div class="alerta alerta-info">
    <p>Llevamos un total de <span class="distintivo"><?php echo $variables["numero-de-apuntes"] ?></span> apuntes</p>
</div>
<div class="alert alert-warning">
    <p><a href="asdft">Este enlace está roto ¡Pruebalo!</a></p>
</div>
<section>
    <div id="top-universidades">
        <div>
            <?php if (count($variables["universidades"]) > 0): ?>
                <?php foreach ($variables["universidades"] as $id => $universidad): ?>
                    <div class="slide"><a href="universidad.php?id=<?php echo $id ?>"><img src="img/universidades/perfil/<?php echo $universidad["img"] ?>"></a></div>
                <?php endforeach; ?>
            <?php else: ?>
                <blockquote><h3>No hay universidades en el top.</h3></blockquote>
            <?php endif; ?>
        </div>
        <div class="clear"></div>
    </div>
    <p><a href="universidades.php"><span class="etiqueta label-primary"><span class="fa fa-plus"></span> Ver todas</span></a></p>
</section>
<div>
    <section class="col-sm-4">
        <h3>Top Carreras</h3>
        <hr>
        <ul>
            <?php if (count($variables["carreras"]) > 0): ?>
                <?php foreach ($variables["carreras"] as $id => $carrera): ?>
                    <li><a href="universidad.php?id=<?php echo $carrera["iduniversidad"] ?>"><?php echo $carrera["siglasuniversidad"] ?></a> - <a href="carrera.php?id=<?php echo $id ?>"><?php echo $carrera["nombre"] ?></a></li>
                <?php endforeach; ?>
            <?php else: ?>
                <blockquote>No hay carreras en el top.</blockquote>
            <?php endif; ?>
        </ul>
        <p><a href="carreras.php"><span class="etiqueta label-primary"><span class="fa fa-plus"></span> Ver todas</span></a></p>
    </section>
    <section class="col-sm-4">
        <h3>Top Asignaturas</h3>
        <hr>
        <ul>
            <?php if (count($variables["asignaturas"]) > 0): ?>
                <?php foreach ($variables["asignaturas"] as $asignatura): ?>
                    <li><a href="asignatura.php?id=<?php echo $asignatura->id ?>"><?php echo $asignatura->nombre ?></a></li>
                <?php endforeach; ?>
            <?php else: ?>
                <blockquote>No hay asignaturas en el top.</blockquote>
            <?php endif; ?>
        </ul>
        <p><a href="asignaturas.php"><span class="etiqueta"><span class="fa fa-plus"></span> Ver todas</span></a></p>
    </section>
    <section class="col-sm-4">
        <h3>Top Apuntes</h3>
        <hr>
        <ul>
            <?php if (count($variables["apuntes"]) > 0): ?>
                <?php foreach ($variables["apuntes"] as $apunte): ?>
                    <li><a href="ver-apunte.php?id=<?php echo $apunte->id ?>"><?php echo $apunte->titulo ?></a></li>
                <?php endforeach; ?>
            <?php else: ?>
                <blockquote>No hay apuntes en el top.</blockquote>
            <?php endif; ?>
        </ul>
        <p><a href="lista-apuntes.php"><span class="label label-primary"><span class="fa fa-plus"></span> Ver todas</span></a></p>
    </section>
</div>
<script>
    $(document).on('ready', function () {
        $("#top-universidades > div").width(<?php echo count($variables["universidades"]) * 178 ?>);
    });
</script>
<?php
$contenido = ob_get_clean();
require "common/std/layout.php";
