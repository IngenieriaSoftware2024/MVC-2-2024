<?php

namespace Controllers;

use Exception;
use Model\permiso;
use Model\Rol;
use Model\Usuario;
use MVC\Router;

class PermisoController
{

    public static function index(Router $router){
        $usuarios = static::buscarUsuario();
        $roles = static::buscarRol();
        $permisos = permiso::all();
    
        $router->render('permiso/index', [
            'usuarios' => $usuarios,
            'roles' => $roles,
            'permisos' => $permisos,
        ]);
    }

    public static function buscarUsuario()
    {
        $sql = "SELECT * FROM usuario where usu_situacion = 1";

        try {
            $usuarios = Usuario::fetchArray($sql);
            return $usuarios;
        } catch (Exception $e) {
            return [];
        }
    }

    public static function buscarRol()
    {
        $sql = "SELECT * FROM rol where rol_situacion = 1";

        try {
            $roles = Rol::fetchArray($sql);
            return $roles;
        } catch (Exception $e) {
            return [];
        }
    }
}
