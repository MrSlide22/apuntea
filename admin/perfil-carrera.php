<?php
require __DIR__ . "/../controladores/ControladorAdmin.php";
$controlador = new ControladorAdmin();
$variables = $controlador->perfilCarrera();
$carrera = $variables["carrera"];
ob_start();
?>
<div class="col-9">
    <?php if (isset($variables["carrera"])): ?>
        <h2>
            <span class="fa fa-graduation-cap"></span> <?php echo $carrera->nombre ?> <small> / <a href="perfil-universidad.php?id=<?php echo $carrera->universidad->id ?>"><?php echo $carrera->universidad->siglas ?></a></small>
        </h2>
        <hr>
        <p>
            <a href="editar-carrera.php?id=<?php echo $carrera->id ?>" class="boton">Editar carrera</a>
            <a href="../servicios/adminHandler.php?action=borrarCarrera&id=<?php echo $carrera->id ?>" class="boton">Eliminar carrera</a>
        </p>
        <div class="col-6">
            <h3>Alumnos:</h3>
            <hr>
            <?php $alumnos = $carrera->ownUsuarioList ?>
            <?php if (count($alumnos) > 0): ?>
                <?php foreach ($alumnos as $a): ?>
                    <div class="fila">
                        <div class="col-3"><p><img src="../img/usuarios/perfil/<?php echo $a->avatar ?>" class="img-responsive"/></p></div>
                        <div class="col-9">
                            <p>
                                <strong><?php echo $a->nombre ?></strong> 
                                <small><a href="usuarios-detalles.php?id=<?php echo $a->id ?>" class="color-green">@<?php echo $a->nick ?></a></small>
                            </p>
                            <blockquote>
                                <p>
                                    <?php echo $a->estado ?>
                                </p>
                            </blockquote>
                        </div>
                        <div class="clear"></div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <blockquote>Esta carrera no tiene usuarios</blockquote>
            <?php endif; ?>
        </div>
        <div class="col-6">
            <h3>Apuntes:</h3>
            <hr>
            <?php $asignatura = $carrera->ownAsignaturaList ?>
            <?php if (count($asignatura) > 0): ?>
                <?php foreach ($asignatura as $as): ?>
                    <?php $apuntes = $as->ownApunteList; ?>
                    <?php if (isset($apuntes)): ?>
                        <?php foreach ($apuntes as $a): ?>
                            <div class="fila">
                                <p>
                                    <span class="col-9">
                                        <span class="fa fa-file-text-o"></span>
                                        <label><a href="ver-apunte.php?id=<?php echo $a->id ?>"><?php echo $a->titulo ?></a></label>
                                    </span>

                                    <span class="col-1"><span class="fa fa-thumbs-o-up"></span> <?php echo $a->likes ?></span>
                                    <span class="col-1"><span class="fa fa-thumbs-o-down"></span> <?php echo $a->dislikes ?></span>
                                    <span class="col-1"><span class="fa fa-eye"></span> <?php echo $a->visualizaciones ?></span>
                                </p>
                                <div class="clear"></div>
                            </div>

                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <blockquote>Esta carrera no tiene apuntes</blockquote>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <blockquote><h3>Carrera no encontrada.</h3></blockquote>
    <?php endif; ?>
</div>
<div class="col-3">
    <h4 class="text-center"><strong>Usuarios añadidos en los últimos 7 meses</strong></h4>
    <canvas id="myChart1"></canvas>
    <hr>
    <h4 class="text-center"><strong>Apuntes añadidos en los últimos 7 meses</strong></h4>
    <canvas id="myChart2"></canvas>
</div>
<script>
    $(document).on('ready', function () {
        //Gráfica 1----------------------------------------------------
        var data1 = {
            labels: [<?php echo $variables["chart1"]["label"] ?>],
            datasets: [
                {
                    fillColor: "rgba(70, 181, 82, 0.2)",
                    strokeColor: "rgba(59, 152, 68, 0.5)",
                    pointColor: "rgba(59, 152, 68, 0.6)",
                    pointStrokeColor: "rgba(59, 152, 68, 0.8)",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [<?php echo $variables["chart1"]["data"] ?>]
                }
            ]
        };

        var canvas1 = document.getElementById("myChart1");
        canvas1.width = $("#myChart1").width() - 50;
        canvas1.height = 200;

        var ctx = document.getElementById("myChart1").getContext("2d");
        var myLineChart2 = new Chart(ctx).Line(data1);

        //Gráfica 2----------------------------------------------------
        var data2 = {
            labels: [<?php echo $variables["chart2"]["label"] ?>],
            datasets: [
                {
                    fillColor: "rgba(70, 181, 82, 0.2)",
                    strokeColor: "rgba(59, 152, 68, 0.5)",
                    pointColor: "rgba(59, 152, 68, 0.6)",
                    pointStrokeColor: "rgba(59, 152, 68, 0.8)",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [<?php echo $variables["chart2"]["data"] ?>]
                }
            ]
        };

        var canvas2 = document.getElementById("myChart2");
        canvas2.width = $("#myChart2").width() - 50;
        canvas2.height = 200;

        var ctx = document.getElementById("myChart2").getContext("2d");
        var myLineChart2 = new Chart(ctx).Line(data2);
    });
</script>
<?php
$contenido = ob_get_clean();
require "../common/admin/layout.php";
