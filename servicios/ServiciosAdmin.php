<?php

require __DIR__ . "/../security/security.php";
require __DIR__ . "/../DB/rb.php";
require __DIR__ . "/../DB/DbConfig.php";

class ServiciosAdmin {

    public function __construct() {
        apunteaSec\checkAdmin();
    }
    
    public function removeGrupo() {
        $idGrupo = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
        $this->setUpDatabase();
        $grupo = R::findOne('grupo', ' id = ? ', [$idGrupo]);
        R::trash($grupo);
        R::close();
        $_SESSION['exito'] = "Grupo eliminado con éxito";
        return "admin/grupos.php";
    }

    public function removeApunte() {
        $idApunte = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
        $this->setUpDatabase();
        $apunte = R::findOne('apunte', ' id = ? ', [$idApunte]);
        R::trash($apunte);
        R::close();
        $_SESSION['exito'] = "Apunte eliminado con éxito";
        return "admin/apuntes.php";
    }
    
    public function sendToAdmin() {
        $idGrupo = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
        $this->setUpDatabase();
        $usuariogrupo = R::findOne('usuariogrupo', ' grupo_id = ? AND isadmin = 1 ', [$idGrupo]);
        R::close();
        return "admin/mensajes.php?id=" . $usuariogrupo->usuario_id;
    }
    
    public function anadirCarrera() {
        $nombre = filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_MAGIC_QUOTES);
        $idUniversidad = filter_input(INPUT_POST, "universidad", FILTER_SANITIZE_NUMBER_INT);
        $rama = filter_input(INPUT_POST, "rama", FILTER_SANITIZE_MAGIC_QUOTES);

        $this->setUpDatabase();

        $carrera = R::dispense('carrera');
        $carrera->nombre = $nombre;
        $carrera->universidad_id = $idUniversidad;
        $carrera->rama = $rama;
        try {
            $idCarrera = R::store($carrera);
            $_SESSION["exito"] = "Carrera insertada con éxito";
            $return = "admin/perfil-carrera.php?id=" . $idCarrera;
        } catch (Exception $e) {
            $_SESSION["error"] = "Error al insertar carrera";
            $return = "admin/anadir-carrera.php";
        }
        R::close();
        return $return;
    }

    //Añadimos la carrera
    public function anadirAsignatura() {

        $idCarrera = filter_input(INPUT_POST, "carrera", FILTER_SANITIZE_MAGIC_QUOTES);
        $curso = filter_input(INPUT_POST, "curso", FILTER_SANITIZE_NUMBER_INT);
        $nombre = filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_MAGIC_QUOTES);
        $apellidos = filter_input(INPUT_POST, "apellidos", FILTER_SANITIZE_MAGIC_QUOTES);

        /*
          Necesitmoas el ide de la univiserdad para saber
         * a que carrera pertenece ?? pero la tabla
         * no tiene este id?
         * 
         * y en descripcion que se pone ?
         *          */
        //$idUniversidad = filter_input(INPUT_POST, "universidad", FILTER_SANITIZE_NUMBER_INT);
        //Conectamos a bd
        $this->setUpDatabase();

        //Obtenemos la asignatura
        $asignatura = R::dispense('asignatura');

        $asignatura->carrera_id = $idCarrera;
        $asignatura->curso = $curso;
        $asignatura->nombre = $nombre;
        $asignatura->apellidos = $apellidos;


        try {
            $idAsignatura = R::store($asignatura);
            $_SESSION["exito"] = "Asignatura insertada con éxito";
            $return = "admin/asignatura.php?id=" . $idAsignatura;
        } catch (Exception $e) {

            $_SESSION["error"] = "Error al insertar asignatura";
            $return = "admin/asignturas-nuevas.php";
        }

        R::close();

        return $return;
    }

    public function borrarAsignatura($parametros) {
        /*
          usar parametros obtenemos el id por este parametro
         *          */

        try {
            $this->setUpDatabase();

            //Ceamos un bean
            $asignatura = R::load('asignatura', $parametros['idAsignatura']);
            //Borramos 
            R::trash($asignatura);

            $_SESSION["exito"] = $asignatura->nombre . " - (" . $asignatura->carrera->nombre . ") borrada con éxito";
            $return = "admin/asignaturas.php";
        } catch (Exception $ex) {

            $_SESSION["error"] = "Error al borrar asignatura";
            $return = "admin/asignaturas.php";
        }


        R::close();

        return $return;
    }

    public function borrarCarrera($parametros) {

        /*
          usar parametros obtenemos el id por este parametro
         *          */

        try {
            $this->setUpDatabase();

            //CReamos un bean
            $carrera = R::load('carrera', $parametros['idCarrera']);
            //Borramos 
            R::trash($carrera);

            $_SESSION["exito"] = $carrera->nombre . " - (" . $carrera->universidad->siglas . ") borrada con éxito";
            $return = "admin/carreras.php";
        } catch (Exception $ex) {

            $_SESSION["error"] = "Error al borrar carrera";
            $return = "admin/carreras.php";
        }


        R::close();

        return $return;
    }
    
    public function getCarreras() {
        $idUni = filter_input(INPUT_POST, "idUniversidad", FILTER_SANITIZE_NUMBER_INT);
        $this->setUpDatabase();
        $carreras = R::findAll("carrera", " universidad_id = ? ORDER BY nombre", [$idUni]);

        R::close();
        return json_encode(R::exportAll($carreras));
    }
    
    public function getGrupos() {
        $this->setUpDatabase();
        $grupos = R::findAll("grupo");
        R::close();
        return json_encode(R::exportAll($grupos));
    }
/*
    public function getGruposCon($cad) {/////////////////////////////////////////
        $this->setUpDatabase();
        $grupos = R::findAll("grupo", "nombre LIKE %?% ", [$cad]);
        R::close();
        return json_encode(R::exportAll($grupos));
    }
*/
    public function getAsignaturas() {
        $idCar = filter_input(INPUT_POST, "idCarrera", FILTER_SANITIZE_NUMBER_INT);
        $this->setUpDatabase();
        $asignaturas = R::findAll("asignatura", " carrera_id = ? ORDER BY nombre", [$idCar]);
        R::close();
        return json_encode(R::exportAll($asignaturas));
    }

    public function cambiarConfiguracion() {

        $idUsuario = filter_var($_SESSION["idUsuario"], FILTER_SANITIZE_NUMBER_INT);

        $nombre = filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_MAGIC_QUOTES);
        $email = filter_input(INPUT_POST, "mail", FILTER_SANITIZE_MAGIC_QUOTES);
        $newPass = filter_input(INPUT_POST, "new-password", FILTER_SANITIZE_MAGIC_QUOTES);
        $pass3 = filter_input(INPUT_POST, "pass3", FILTER_SANITIZE_MAGIC_QUOTES);

        $this->setUpDatabase();

        $usuario = R::findOne('usuario', ' id = ?', [$idUsuario]);
        $usuario->nombre = $nombre;
        $usuario->email = $email;

        if ($newPass != "" && $newPass == $pass3) {

            $usuario->password = password_hash($newPass, PASSWORD_DEFAULT);

            R::store($usuario);

            $_SESSION["exito"] = "Los datos y la contraseña han sido guardadas con exito.";

            $return = "admin/inicio.php";
        } else if ($newPass == "") {

            R::store($usuario);

            $_SESSION["exito"] = "Los datos  han sido guardadas con exito.";

            $return = "admin/inicio.php";
        } else {

            $_SESSION["error"] = "Error. Las contraseñas deben ser iguales";

            //Volvemos a la pagina 
            $return = "admin/editar-admin.php";
        }

        R::close();

        return $return;
    }

    private function setUpDatabase() {
        R::setup('mysql:host=' . DbConfig::$dbHost . ';dbname=' . DbConfig::$dbName, DbConfig::$dbUser, DbConfig::$dbPassword);
    }

}
