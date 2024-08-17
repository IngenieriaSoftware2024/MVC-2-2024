<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\ProductoController;
use Controllers\UsuarioController;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [AppController::class,'index']);

// PRODUCTOS
$router->get('/productos', [ProductoController::class, 'index']);
$router->post('/API/productos/guardar', [ProductoController::class, 'guardarAPI']);
$router->get('/API/productos/buscar', [ProductoController::class, 'BuscarAPI']);
$router->post('/API/productos/modificar', [ProductoController::class, 'modificarAPI']);
$router->post('/API/productos/eliminar', [ProductoController::class, 'eliminarAPI']);

// USUARIOS
$router->get('/usuarios', [UsuarioController::class, 'index']);
$router->post('/API/usuario/guardar', [UsuarioController::class, 'guardarAPI']);
$router->get('/API/usuario/buscar', [UsuarioController::class, 'buscarAPI']);
$router->post('/API/usuario/modificar', [UsuarioController::class, 'modificarAPI']);
$router->post('/API/usuario/eliminar', [UsuarioController::class, 'eliminarAPI']);


// APLICACIONES

$router->get('/aplicacion', [UsuarioController::class, 'index']);



// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
