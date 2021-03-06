<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <p class="logo col-1">
                <a href="inicio.php"><img src="../img/logo-inv.png"></a>
            </p>
        </div>
        <a href="header.php"></a>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left" role="search" action="../usuario/resultado-de-busqueda.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
                </div>
                <button type="submit" class="btn btn-primary"><span class="fa fa-search"></span></button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <?php if ($variables["peticiones-apuntes"] > 0): ?>
                    <li>
                        <a href="peticiones-visualizacion.php">
                            <span class="fa fa-file-o"></span><span class="menu-label"> Peticiones de amistad</span>
                                <span class="badge"><?php echo $variables["peticiones-apuntes"] ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="peticiones.php">
                        <span class="fa fa-user-plus"></span><span class="menu-label"> Peticiones de amistad</span>
                        <?php if ($variables["n-peticiones"] > 0): ?>
                            <span class="badge"><?php echo $variables["n-peticiones"] ?></span>
                        <?php endif; ?>
                    </a>
                </li>
                <li><a href="subir-apuntes.php"><span class="fa fa-cloud-upload"></span><span class="menu-label"> Subir apuntes</span></a></li>
                <li><a href="../servicios/usuarioHandler.php?action=logout"><span class="fa fa-power-off"></span><span class="menu-label"> Cerrar sesión</span></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>