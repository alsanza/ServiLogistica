// subir foto usuario

$(".nuevaFoto").change(function () {

    let imagen = this.files[0];

    //console.log("imagen", imagen);

    /* ================================
        VALIDAR FORMATO DE LA IMAGEN
     =============================== */

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

        $(".nuevaFoto").val("");

        Swal.fire({
            icon: "error",
            title: "Error al subir la imágen",
            text: "!La imagen debe estar en formato JPG o PNG",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
        })
    } else if (imagen["size"] > 2000000) {

        $(".nuevaFoto").val("");

        Swal.fire({
            icon: "error",
            title: "Error al subir la imágen",
            text: "!La imagen NO debe pesar más de 2MG",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
        });

    } else {
        let datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function (event) {
            let rutaImagen = event.target.result;
            $(".previsualizar").attr("src", rutaImagen);
        });
    }
})

/* ================================
    EDITAR USUARIO
=============================== */

$(document).on("click", ".btn-editar-usuario", function () {

    let idUsuario = $(this).attr("idUsuario");
    //console.log("idUsuario", idUsuario);

    let datos = new FormData();

    datos.append("idUsuario", idUsuario);

    $.ajax({

        url: "ajax/usuario.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",

        success: function (respuesta) {
            console.log("respuesta", respuesta);
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarUsuario").val(respuesta["usuario"]);
            $("#editarPerfil").html(respuesta["perfil"]);
            $("#editarPerfil").val(respuesta["perfil"]);
            $("#fotoActual").val(respuesta["foto"]);

            $("#passwordActual").val(respuesta["password"]);

            if (respuesta["perfil"] != "") {
                $(".previsualizar").attr("src", respuesta["foto"]);
            }
        }

    })

})

/* ================================
    ELIMINAR USUARIO
=============================== */

$(".btn-eliminar-usuario").click(function () {

    let idUsuario = $(this).attr("idUsuario");
    let fotoUsuario = $(this).attr("fotoUsuario");
    let usuario = $(this).attr("usuario");

    Swal.fire({
        icon: "warning",
        title: "¿Está seguro que quiere eliminar este usuario?",
        text: "!Sí no lo esta puede cancelar esta acción¡",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: "Cancelar",
        confirmButtonText: "Borrar usuario",
    }).then((result)=> {
        if(result.value){
            window.location = "index.php?ruta=users&idUsuario="+idUsuario+"&usuario"+usuario+"fotoUsuario="+fotoUsuario;
        }
    })
})



/* los input llevan una acción change y los botones las acciones de click

================================
    CREAR USUARIO
===============================

================================
    EDITAR USUARIO
===============================
Cuando hagamos click en el boton para editar usuario del formulario, vamos a capturar ese ID de usuario que acabamos de seleccionar y vamos a ejecutar una función, dentro de la función vamos a crear una variable donde vamos a capturar el ID del usuario y luego de obtener el id del usuario, a través de AJAX nos vamos a conectar con la base de datos y podremos consultar los registros que tiene un usuario en la base de datos para realizar esto creamos una variable a la cual le vamos a instanciar una clase formData() propia de JavasCript, luego a esa variable le vamos a insertar la variable post que viene del formulario y la vamos a comparar con la varible que almacena el valor recibido del formulario

================================
    BORRAR USUARIO
===============================
Antes de borrar un registro de la base de datos, debemos preguntar primero si de verdad el usuario quiere borrar un registro, para esto utilizamos una alerta que nos pregunte sí de verdad queremos borrar el registro, si el usuario decide que NO quiere borrar el registro da click en el boton cancelar y se termina la acción, pero sí decide que SI quiere borrar el registro 

*/