<?php

namespace Controllers;

use Exception;
use Model\Producto;
use MVC\Router;

class ProductoController
{
    public static function index(Router $router)
    {
        $router->render('productos/index', []);
    }

    public static function guardarAPI()
    {
        $_POST['producto_nombre'] = htmlspecialchars($_POST['producto_nombre']);
        $_POST['producto_precio'] = filter_var($_POST['producto_precio'], FILTER_VALIDATE_FLOAT);

        try {
            $producto = new Producto($_POST);
            $resultado = $producto->crear();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Registro Guardado Correctamente'
            ]);
        } catch (Exception $error) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al Guardar Registro',
                'detalle' => $error->getMessage()
            ]);
        }
    }

    public static function BuscarAPI()
    {
        try {

            $productos = Producto::all();
            http_response_code(200);
            echo json_encode($productos);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al buscar productos',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function BuscarQuery()
    {
        $sql = ' SELECT * FROM productos WHERE producto_situacion = 1';
        // return self::
    }
}
