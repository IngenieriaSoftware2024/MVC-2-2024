<?php

namespace Controllers;

use MVC\Router;

class ChartController {
    public static function index(Router $router){
        isAuth();
        $router->render('charts/index', [], 'layouts/menu');
    }

}