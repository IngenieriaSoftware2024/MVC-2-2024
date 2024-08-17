<?php

namespace Controllers;

use MVC\Router;

class UsuarioController
{
    public static function index(Router $router)
    {
        $router->render('aplicacion/index', []);
    }

}


