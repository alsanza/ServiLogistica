<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema post</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="views/dist/css/adminlte.css">
    <!-- icono web -->
    <link rel="icon" href="views/img/logo.jpeg" type="image/x-icon">

    <!-- DataTables -->
    <link rel="stylesheet" href="views/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="views/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="views/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- jQuery -->
    <script src="views/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="views/dist/js/adminlte.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="views/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="views/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="views/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="views/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="views/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="views/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="views/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="views/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="views/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Sweetalertc Plugins -->
    <script src="views/plugins/sweetalert2/sweetalert2.all.min.js"></script>
</head>
<body class="hold-transition sidebar-collapse sidebar-mini">
    
    <?php

    if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "logueado") {
      # code...
    

      /* Site wrapper */
      echo '<div class="wrapper">';
        /* Navbar */
        include "modules/cabezera.php";

        /* Main Sidebar Container */
        include "modules/menu-lateral.php";

        if (isset($_GET["ruta"])) {

          if ($_GET["ruta"] == "home" || 
              $_GET["ruta"] == "users" ||
              $_GET["ruta"] == "categories" ||
              $_GET["ruta"] == "employe" ||
              $_GET["ruta"] == "customers" ||
              $_GET["ruta"] == "products" ||
              $_GET["ruta"] == "new-sale" ||
              $_GET["ruta"] == "reports" ||
              $_GET["ruta"] == "salir") {

            include "modules/".$_GET["ruta"].".php";

          }else {
            include "modules/404.php";
          }
          
        }else {
          include "modules/home.php";
        }
        

        include "modules/footer.php";

      
      echo'</div>';
        /* ./wrapper */

      }else {

        include "modules/login.php";

      }
    ?>

 <script src="views/js/main.js"></script>
 <script src="views/js/usuario.js"></script>
</body>
</html>
