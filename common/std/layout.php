<html>
    <head>
        <title>Apuntea - Tu red social de apuntes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/componentes.css" />
        <link rel="stylesheet" type="text/css" href="css/default.css" />
        <script src="js/jquery-2.1.1.js"></script>
        <script src="js/bootstrap.js"></script>
    </head>
    <body>

        <header>
            <?php require "header.php"; ?>
        </header>

        <div class="contenedor">
            <div class="col-9 wrapper">
                <main>
                    <?php echo $contenido; ?>
                </main>
                <div class="clear"></div>
                <footer>
                    <?php require "footer.php" ?>
                </footer>
            </div>
            <aside class="col-3" id="sidebar">
                <?php require "sidebar.php"; ?>
            </aside>
            <div class="clearfix"></div>
        </div>
    </body>
</html>

