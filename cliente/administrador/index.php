<?php 
session_start();
ob_start();
require_once "controladores/plantillaControl.php";
require_once "modelos/enlaces.php";
require_once "modelos/crud.php";

require_once "modelos/rutas.php";


$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();

ob_end_flush();

?>