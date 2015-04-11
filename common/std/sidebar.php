<div class="panel">
    <div class="panel-cabecera"><strong>Acceder</strong></div>
    <div class="panel-cuerpo">
        <form action="usuario/inicio.php" method="post">
            <input type="text" class="campo-formulario" id="username" placeholder="Usuario">
            <br>
            <input type="password" class="campo-formulario" id="password" placeholder="Contraseña">
            <input type="submit" class="campo-formulario" value="Entrar">
        </form>
        <hr>
        <div>
            <p>
                <strong>¿Aún no estas registrado?</strong> haz click en el siguiente botón para registrarte<br><br>
                <input type="submit" class="campo-formulario" data-toggle="modal" data-target="#myModal" value="Registrarse">
            </p>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-cabecera"><strong>Búsqueda</strong></div>
    <div class="panel-cuerpo">
        <form action="resultado-busqueda.php" method="post">
            <label><input type="radio" name="opcion" value="universidades" checked> Universidades</label><br>
            <label><input type="radio" name="opcion" value="carreras"> Carreras</label><br>
            <label><input type="radio" name="opcion" value="asignaturas"> Asignaturas</label><br><br>
            <input type="text" class="campo-formulario" name="consulta" placeholder="Escribe aquí tu consulta">
            <br>
            <input type="submit" class="campo-formulario" value="Buscar">
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Regístrate</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="#" method="post">
                    <div class="form-group">
                        <label for="reg-alias" class="col-sm-2 control-label">Alias de usuario</label>
                        <div class="col-sm-10">
                            <input type="text" id="reg-alias" class="form-control" placeholder="Alias de usuario" name="alias">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="reg-nombre" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" id="reg-nombre" class="form-control" placeholder="Nombre" name="nombre">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="reg-apellidos" class="col-sm-2 control-label">Apellidos</label>
                        <div class="col-sm-10">
                            <input type="text" id="reg-apellidos" class="form-control" placeholder="Apellidos" name="apellidos">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="reg-apellidos" class="col-sm-2 control-label">Apellidos</label>
                        <div class="col-sm-10">
                            <input type="text" id="reg-apellidos" class="form-control" placeholder="Apellidos" name="apellidos">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="reg-email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" id="reg-email" class="form-control" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="reg-password" class="col-sm-2 control-label">Contraseña</label>
                        <div class="col-sm-10">
                            <input type="password" id="reg-password" class="form-control" placeholder="Contraseña" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="reg-password2" class="col-sm-2 control-label">Repite la contraseña</label>
                        <div class="col-sm-10">
                            <input type="password" id="reg-password2" class="form-control" placeholder="Repite la contraseña" name="password2">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary form-control">Regístrate</button>
                        </div>
                    </div>
                </form>
                <blockquote>
                    <h4>O si lo prefieres regístrate con alguna de estas redes sociales:</h4>
                    <h1 class="text-center ">
                        <a href="#"><i class="fa fa-facebook-square"></i></a>
                        <a href="#"><i class="fa fa-twitter-square"></i></a>
                    </h1>
                </blockquote>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("ready", function () {

        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').focus();
        });
    });
</script>