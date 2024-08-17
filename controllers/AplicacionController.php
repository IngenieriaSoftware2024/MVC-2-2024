<?php

namespace Controllers;

use MVC\Router;

class AplicacionController
{
    public static function index(Router $router)
    {
        $router->render('aplicacion/index', []);
    }

}


