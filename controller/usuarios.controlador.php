<?php

class ControladorUsuarios
{
    static public function ctrIngresoUsuario() {

        if (isset($_POST["ingUsuario"])) {
            # Validación del lado del servidor de caracteres
            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {

                $tabla = "usuarios";

                $item = "usuario";
                $valor = $_POST["ingUsuario"];

                $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

                /* var_dump($respuesta); */

                if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"]) {

                   $_SESSION["iniciarSesion"] = "logueado";

                   echo '<script>
                    window.location = "home";
                   </script>';

                }else {
                    echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                }

            }
        }
    }

    static public function ctrCrearUsuario() {

    }

    static public function ctrMostrarUsuarios() {

    }

    static public function ctrEditarUsuario() {

    }

    static public function ctrEliminarUsuario() {

    }
}
