<?php

/*=============================================
Mostrar errores
=============================================*/

ini_set('display_errors', 1);
ini_set("log_errors", 1);
ini_set("error_log",  "D:/xampp/htdocs/pos/php_error_log");

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/test.controlador.php";
require_once "controladores/testopcion.controlador.php";
require_once "controladores/testaction.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/eventos.controlador.php";
require_once "controladores/vieventos.controlador.php";
require_once "controladores/itemcorum.controlador.php";
require_once "controladores/ventas.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/test.modelo.php";
require_once "modelos/testopcion.modelo.php";
require_once "modelos/testaction.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/eventos.modelo.php";
require_once "modelos/vieventos.modelo.php";
require_once "modelos/itemcorum.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "extensiones/vendor/autoload.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();