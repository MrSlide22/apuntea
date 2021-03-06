<?php
/* GRAFICA
 * Usuarios+/dia
 */
require __DIR__ . "/../controladores/ControladorAdmin.php";
$controlador = new ControladorAdmin();
$variables = $controlador->usuarios();

ob_start();
?>
<div class="col-9">
    <h2>
        <span class="fa fa-users"></span> Administración de usuarios
    </h2>
    <hr>
    <input id="buscar" type="text" class="campo-formulario" placeholder="Buscar Contacto...">
    <?php if (count($variables["usuarios"]) > 0): ?>
        <?php
        foreach ($variables["usuarios"] as $usuario):
            ?>
            <div class="col-6 contacto" >

                <div class="fila">
                    <div class="col-5"><p><img src="../img/usuarios/perfil/<?php echo $usuario->avatar ?>" class="img-responsive"/></p></div>
                    <div class="col-7">
                        <p>
                            <small><a href="usuarios-detalles.php?id=<?php echo $usuario->id ?>" class="color-green nick">@<?php echo $usuario->nick ?></a></small>
                        </p>
                        <p>
                            <span class="distintivo"><?php echo count($usuario->alias('alice')->ownContactoList) + count($usuario->alias('bob')->ownContactoList) ?> </span> Amigos<br><br>
                            <a href="mensajes.php?id=<?php echo $usuario->id ?>" class="boton">Enviar mensaje</a>
                        </p>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <?php
        endforeach;
        ?>
    <?php else: ?>
    <blockquote><h3>No hay usuarios.</h3></blockquote>
    <?php endif; ?>
</div>
<div class="col-3">
    <h4 class="text-center"><strong>Nº usuarios registrados en los últimos 7 meses</strong></h4>
    <canvas id="myChart1"></canvas>
    <h4 class="text-center"><strong>Usuarios con más apuntes</strong></h4>
    <canvas id="myChart2"></canvas>
</div>

<script>

    $(document).on("ready", function () {

        $("#buscar").on("keyup", function () {

            consulta = $(this).val();

            $(".contacto").each(function () {

                var nombre = $(this).find(".nombre").text();
                var nick = $(this).find(".nick").text();
                if (quitaAcentos(nombre.toLowerCase()).indexOf(quitaAcentos(consulta.toLowerCase())) !== -1 || quitaAcentos(nick.toLowerCase()).indexOf(quitaAcentos(consulta.toLowerCase())) !== -1) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });

    function quitaAcentos(str) {
        for (var i = 0; i < str.length; i++) {
            if (str.charAt(i) == "á")
                str = str.replace(/á/, "a");
            if (str.charAt(i) == "é")
                str = str.replace(/é/, "e");
            if (str.charAt(i) == "í")
                str = str.replace(/í/, "i");
            if (str.charAt(i) == "ó")
                str = str.replace(/ó/, "o");
            if (str.charAt(i) == "ú")
                str = str.replace(/ú/, "u");
        }
        return str;
    }
</script>

<script>
    $(document).on("ready", function () {

        var canvas1 = document.getElementById("myChart1");


        canvas1.width = $("#myChart1").width() - 50;
        canvas1.height = 200;


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
        var myLineChart2 = new Chart(ctx).Bar(data2);

    });
</script>
<?php
$contenido = ob_get_clean();
require "../common/admin/layout.php";
