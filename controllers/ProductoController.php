<?php

namespace Controllers;

use MVC\Router;

class ProductoController {
    public static function index(Router $router){
        $router->render('productos/index', []);
    }

    public static function guardarAPI(){
        echo json_encode('Hola');
    }

}