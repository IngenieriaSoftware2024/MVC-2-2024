<?php

namespace Controllers;


use MVC\Router;

class LoginController
{
    public static function login(Router $router)
    {
        isNotAuth();
        $router->render('/auth/login', []);
    }
}