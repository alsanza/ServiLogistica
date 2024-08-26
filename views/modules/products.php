<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1>Gestionar productos</h1>
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
              <tr>
                <td>1</td>
                <td>Alejandro Sánchez Zapata</td>
                <td>alsan</td>
                <td><img src="views/img/user-icon.png" alt="" class="img-thumbnail" width="40px"></td>
                <td>Administrador</td>
                <td><button class="btn btn-success btn-xs">activo</button></td>
                <td>0000/00/00</td>
                <td><div class="btn-group">
                  <button class="btn btn-warning"><i class="fas fa-pen"></i></button>
                  <button class="btn btn-danger"><i class="fas fa-trash"></i></i></button>
                </div></td>
              </tr>
              
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
                    <option value="1">Administrador</option>
                    <option value="2">Especial</option>
                    <option value="3">Vendedor</option>
                  </select>
                </div>
              </div>
              <!-- Entrada para subir foto -->
              <div class="form-group">
                <div class="panel text-upercase">SUBIR FOTO</div>
                <input type="file" name="nuevaFoto" id="nuevaFoto">
                <p class="help-block">Peso máximo de la foto 200MB</p>
                <img src="views/img/user-icon.png" class="img-thumbnail" width="100px" alt="">
              </div>
            
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default float-start" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        
      </form>
    </div>

  </div>
</div>

