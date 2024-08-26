
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
       
      <!-- User Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">

          <?php
            if($_SESSION["foto"] != ""){
              echo '<img src="'.$_SESSION["foto"].'" alt="" width="25px">';
            }else {
              echo '<img src="views/img/user-icon.png" alt="" width="25px">';
            }
          ?>
          
          <span class="hidden-xs"><?php echo $_SESSION["nombre"];?></span>
        </a>
        <ul class="dropdown-menu">

           <li class="user-body">

                <div class="pull-right">
                    <span></span>
                    <a href="salir" class="btn btn-default btn-flat">Salir</a>
                </div>

            </li>
        
        </ul>
      </li>
       <!-- Full screen -->
       <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
</nav>
  <!-- /.navbar -->

