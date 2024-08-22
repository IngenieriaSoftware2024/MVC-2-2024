<?php

namespace Controllers;

use MVC\Router;

class AppController {
    public static function index(Router $router){
        isAuth();
        $router->render('pages/index', []);
    }

}