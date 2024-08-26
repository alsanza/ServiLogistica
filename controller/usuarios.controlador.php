<?php

class ControladorUsuarios
{
    static public function ctrIngresoUsuario() {

        if (isset($_POST["ingUsuario"])) {
            # Validación del lado del servidor de caracteres
            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {

                    $encriptar = crypt($_POST["ingPassword"], '$2a$07$usesomesillystringforsalt$');

                    $tabla = "usuarios";

                    $item = "usuario";
                    $valor = $_POST["ingUsuario"];

                    $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

                /* var_dump($respuesta); */

                if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar) {

                   $_SESSION["iniciarSesion"] = "logueado";
                   $_SESSION["id"] = $respuesta["id"];
                   $_SESSION["nombre"] = $respuesta["nombre"];
                   $_SESSION["usuario"] = $respuesta["usuario"];
                   $_SESSION["foto"] = $respuesta["foto"];
                   $_SESSION["perfil"] = $respuesta["perfil"];

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
        if (isset($_POST["nuevoUsuario"])) {
            
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])) {

                    $ruta ="";

                    if (isset($_FILES["nuevaFoto"]["tmp_name"])) {
                        
                        // var_dump($_FILES["nuevaFoto"]["tmp_name"]);

                        list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                        $nuevoAncho = 500;
                        $nuevoAlto = 500;

                        $directorio = "views/img/usuarios/".$_POST["nuevoUsuario"];
                        mkdir($directorio,0755,true);

                        if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {
                            
                            $aleatorio = mt_rand(100,999);

                            $ruta = "views/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";
                            $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagejpeg($destino, $ruta);
                        }
                        if ($_FILES["nuevaFoto"]["type"] == "image/png") {
                            
                            $aleatorio = mt_rand(100,999);

                            $ruta = "views/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";
                            $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagepng($destino, $ruta);
                        }
                    }

                    $tabla = "usuarios";

                    $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$usesomesillystringforsalt$');

                    $datos = array( "nombre" => $_POST["nuevoNombre"],
                                    "usuario" => $_POST["nuevoUsuario"],
                                    "password" => $encriptar,
                                    "perfil" => $_POST["nuevoPerfil"],
                                    "foto" => $ruta);

                    $respuesta = ModeloUsuarios::mdlCrearUsuario($tabla, $datos);

                    if ($respuesta == "creado") {

                        echo'<script>

                            Swal.fire({
                            icon: "success",
                            title: "!El usuario fué creado con éxito¡",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            }).then((result => {
                                if(result.value){
                                    window.location = "users";
                                }
                            }));
                        
                        </script>';
                    }

            }else {

                echo'<script>

                Swal.fire({
                    icon: "error",
                    title: "!El usuario no puede ir vacío o llevar carácteres especiales¡",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                }).then((result => {
                    if(result.value){
                        window.location = "users";
                    }
                }));
                
                </script>';

            }
        }
    }

    static public function ctrMostrarUsuarios($item, $valor) {

        $tabla = "usuarios";

        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrEditarUsuario() {

        if (isset($_POST["editarUsuario"])) {
            
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {

                $ruta =$_POST["fotoActual"];

                if (isset($_FILES["editarFoto"]["tmp_name"])) {
                    
                    // var_dump($_FILES["editarFoto"]["tmp_name"]);

                    list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    $directorio = "views/img/usuarios/".$_POST["editarUsuario"];

                    // VALIDAMOS SI EXISTE FOTO ACTUAL
                    if (!empty($_POST["fotoActual"])) {

                        unlink($_POST["fotoActual"]);

                    }else {

                        mkdir($directorio,0755,true);

                    }
                    if ($_FILES["editarFoto"]["type"] == "image/jpeg") {
                        
                        $aleatorio = mt_rand(100,999);

                        $ruta = "views/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";
                        $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }
                    if ($_FILES["editarFoto"]["type"] == "image/png") {
                        
                        $aleatorio = mt_rand(100,999);

                        $ruta = "views/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";
                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                    }
                }

                $tabla = "usuarios";

                if ($_POST["editarPassword" != ""]) {
                    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])) {
                        $encriptar = crypt($_POST["editaroPassword"], '$2a$07$usesomesillystringforsalt$');
                    } else {

                        echo'<script>

                        Swal.fire({
                            icon: "error",
                            title: "!La contraseña no puede ir vacía o llevar carácteres especiales¡",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                        }).then((result => {
                            if(result.value){
                                window.location = "users";
                            }
                        }));
                        
                        </script>';
                    }
                    
                } else {
                    $encriptar = $passwordActual;
                }

               

                $datos = array( "nombre" => $_POST["editarNombre"],
                                "usuario" => $_POST["editarUsuario"],
                                "password" => $encriptar,
                                "perfil" => $_POST["editarPerfil"],
                                "foto" => $ruta);

                $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

                if ($respuesta == "editado") {

                    echo'<script>

                        Swal.fire({
                        icon: "success",
                        title: "!Cambios guardados con éxito¡",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        }).then((result => {
                            if(result.value){
                                window.location = "users";
                            }
                        }));
                    
                    </script>';
                }

            }else {

                echo'<script>

                Swal.fire({
                    icon: "error",
                    title: "!El nombre de usuario no puede ir vacío o llevar carácteres especiales¡",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                }).then((result => {
                    if(result.value){
                        window.location = "users";
                    }
                }));
                
                </script>';

            }
        }

    }

    static public function ctrEliminarUsuario() {
        if (isset($_GET["idUsuario"])) {

            $tabla = "usuarios";
            $datos = $_GET["idUsuario"];

            // Si respuesta foto viene vacío
            if ($_GET["foto"] != "") {
                
                //Eliminamos el archivo de la foto
                unlink($_GET["foto"]);

                //Eliminamos el directorio o carpeta de la foto del usuario
                rmdir('views/img/usuarios/'.$_GET["usuario"]);
                
            }

            $respuesta = ModeloUsuarios::mdlEliminarUsuario($tabla, $datos);

            if ($respuesta == "eliminado") {

                echo'<script>

                    Swal.fire({
                    icon: "success",
                    title: "!El usuario fué borrado con éxito¡",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    }).then((result => {
                        if(result.value){
                            window.location = "users";
                        }
                    }));
                
                </script>';
            }

        }
    }
}
