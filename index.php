<?php
require_once "controller/plantilla.controlador.php";
require_once "controller/usuarios.controlador.php";
require_once "controller/clientes.controlador.php";
require_once "controller/productos.controlador.php";

require_once "model/modelo.usuarios.php";
require_once "model/modelo.clientes.php";
require_once "model/modelo.productos.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();