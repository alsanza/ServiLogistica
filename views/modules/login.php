<section class="login-page">
    <div id="back"></div>
    <div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Sistema</b>POS</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
        <p class="login-box-msg">Ingresa tus credenciales para acceder al sistema!</p>

        <form method="post">
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-user"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
            </div>

            <?php
                $login = new ControladorUsuarios();
                $login -> ctrIngresoUsuario();
            ?>

        </form>
        </div>
        <!-- /.login-card-body -->
    </div>
    </div>
    <!-- /.login-box -->
</section>