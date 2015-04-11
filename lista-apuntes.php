<?php ob_start(); ?>
<section id="presentacion">
    <h1>Apuntes</h1>
</section>
<ul class="breadcrumb">
    <li><a href="index.php">Apuntea</a></li>
    <li>Apuntes</li>
</ul>
<hr>
<form>
    <input type="text" class="campo-formulario" placeholder="Buscar...">
    <label>Universidad: </label>
    <select class="campo-formulario campo-en-linea">
        <option>Todas</option>
        <option>[Nombre universidad]</option>
        <option>[Nombre universidad]</option>
        <option>[Nombre universidad]</option>
    </select>
    <label>Carrera: </label>
    <select class="campo-formulario campo-en-linea">
        <option>Todas</option>
        <option>[Nombre carrera]</option>
        <option>[Nombre carrera]</option>
        <option>[Nombre carrera]</option>
    </select>
    <label>Asignatura: </label>
    <select class="campo-formulario campo-en-linea">
        <option>Todas</option>
        <option>[Nombre asignatura]</option>
        <option>[Nombre asignatura]</option>
        <option>[Nombre asignatura]</option>
    </select>
</form>
<section>
    <div>
        <h2><span class="fa fa-paint-brush"></span> Artes y humanidades</h2>
        <hr>
        <ul>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
        </ul>
    </div>

    <div>
        <h2><span class="fa fa-rocket"></span> Ciencias</h2>
        <hr>
        <ul>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
        </ul>
    </div>

    <div>
        <h2><span class="fa fa-user-md"></span> Ciencias de la salud</h2>
        <hr>
        <ul>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
        </ul>
    </div>
    <div>
        <h2><span class="fa fa-cogs"></span> Ingeniería y arquitectura</h2>
        <hr>
        <ul>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
        </ul>
    </div>

    <div>
        <h2><span class="fa fa-gavel"></span> Ciencias sociales y jurídicas</h2>
        <hr>
        <ul>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
            <li><a href="apuntes.php">[Nombre de apuntes]</a></li>
        </ul>
    </div>
</section>
<?php

$contenido = ob_get_clean();
require "common/std/layout.php";
