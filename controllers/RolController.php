<?php

namespace Controllers;


use MVC\Router;

class RolController
{
    public static function index(Router $router)
    {
        $router->render('rol/index', []);
    }
}