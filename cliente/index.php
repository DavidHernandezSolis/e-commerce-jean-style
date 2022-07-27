<?php 
session_start();
require_once "controladores/clienteControl.php";
require_once "controladores/slideControlador.php";

require_once "modelos/clienteModelo.php";
require_once "modelos/slideModelo.php";

require_once "modelos/rutas.php";

$plantilla = new ControladorCliente();
$plantilla -> plantilla();
