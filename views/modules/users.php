<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1>Gestionar usuarios</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home">Inicio</a></li>
                  <li class="breadcrumb-item active">Usuarios</li>
                  </ol>
              </div>
        </div>
      </div><!-- /.container-fluid -->
  </section>
  <section class="content">

      <!-- Default box -->
      <div class="card">
        
        <div class="card-header">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Usuario</button>
        </div>

        <div class="card-body">

          <table class="table table-bordered table striped dt-responsive tablas">
            <thead>
              <tr>
                <th>id</th>
                <th>NOMBRE</th>
                <th>USUARIO</th>
                <th>FOTO</th>
                <th>PERFIL</th>
                <th>ESTADO</th>
                <th>ULTIMO LOGIN</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <tbody>

            <?php
              $item = null;
              $valor = null;

              $listarUsuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

              //var_dump($listarUsuarios);

              foreach ($listarUsuarios as $key => $value) {
                
                echo'
                  
                  <tr>
                    <td>'.$value["id"].'</td>
                    <td>'.$value["nombre"].'</td>
                    <td>'.$value["usuario"].'</td>';
               
                    if($value["foto"] != ""){
                      echo'<td><img src="'.$value["foto"].'" alt="" class="img-thumbnail" width="40px"></td>';
                    }else{
                      echo'<td><img src="views/img/user-icon.png" alt="" class="img-thumbnail" width="40px"></td>';
                    }
                    
                  echo'
                    <td>'.$value["perfil"].'</td>
                    <td><button class="btn btn-success btn-xs">activo</button></td>
                    <td>'.$value["ultimo_login"].'</td>
                    <td><div class="btn-group">
                      <button class="btn btn-warning btn-editar-usuario" data-toggle="modal" data-target="#modalEditarUsuario" idUsuario="'.$value["id"].'"><i class="fas fa-pen"></i></button>
                      <button class="btn btn-danger btn-eliminar-usuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fas fa-trash"></i></i></button>
                    </div></td>
                  </tr>';

              }
                
            ?>
            </tbody>
          </table>
        
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
       
</div>
<!-- /.content-wrapper -->


<!-- MODAL CREAR USUARIO -->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <h4 class="modal-title">Agregar Usuario</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">

          <div class="box-body">

              <!-- entrada para el nombre -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>
                </div>
              </div>
              <!-- entrada para el usuario -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresa un usuario" required>
                </div>
              </div>
              <!-- Entrada para la contraseña -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresa la contraseña" required>
                </div>
              </div>
              <!-- Entrada para el perfil del usuario -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-users"></i></span>
                  <select class="form-control input-lg" name="nuevoPerfil" id="">
                    <option value="">Seleccione perfil</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Especial">Especial</option>
                    <option value="Vendedor">Vendedor</option>
                  </select>
                </div>
              </div>
              <!-- Entrada para subir foto -->
              <div class="form-group">
                <div class="panel text-upercase">SUBIR FOTO</div>
                <input type="file" name="nuevaFoto" class="nuevaFoto">
                <p class="help-block">Peso máximo de la foto 2MB</p>
                <img src="views/img/user-icon.png" class="img-thumbnail previsualizar" width="100px" alt="">
              </div>
            
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default float-start" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <?php

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();

        ?>
      </form>
    </div>

  </div>
</div>

<!-- MODAL EDITAR USUARIO -->


<div id="modalEditarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <h4 class="modal-title">Editar Usuario</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">

          <div class="box-body">

              <!-- entrada para el nombre -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                  <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>
                </div>
              </div>
              <!-- entrada para el usuario -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                  <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>
                </div>
              </div>
              <!-- Entrada para la contraseña -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Ingresa la nueva contraseña" required>
                  <input type="hidden" id="passwordActual" name="passwordActual">
                </div>
              </div>
              <!-- Entrada para el perfil del usuario -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-users"></i></span>
                  <select class="form-control input-lg" name="editarPerfil">
                    <option value="" id="editarPerfil"></option>
                    <option value="Administrador">Administrador</option>
                    <option value="Especial">Especial</option>
                    <option value="Vendedor">Vendedor</option>
                  </select>
                </div>
              </div>
              <!-- Entrada para subir foto -->
              <div class="form-group">
                <div class="panel text-upercase">SUBIR FOTO</div>
                <input type="file" name="editarFoto" class="nuevaFoto">
                <p class="help-block">Peso máximo de la foto 2MB</p>
                <img src="views/img/user-icon.png" class="img-thumbnail previsualizar" width="100px" alt="">
                <input type="hidden" name="fotoActual" id="fotoActual">
              </div>
            
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default float-start" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
        <?php

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrEditarUsuario();

        ?>
      </form>
    </div>

  </div>
</div>

<?php

  $eliminarUsuario = new ControladorUsuarios();
  $eliminarUsuario -> ctrEliminarUsuario();

?>

<!-- 

================================
    EDITAR USUARIO
===============================

En el formulario vamos a crear un boton para editar los usuarios,



-->
