<?php

namespace Controllers;

use Exception;
use Model\Producto;
use MVC\Router;

class DetalleController {
    public static function estadisticas(Router $router){
        isAuth();
        $router->render('productos/estadistica', [], 'layouts/menu');
    }

    public static function detalleVentaAPI(){

        try {
            $sql = "SELECT producto_nombre AS PRODUCTO, sum(detalle_cantidad) AS CANTIDAD from detalle_ventas
            INNER JOIN productos ON producto_id = detalle_producto
            WHERE detalle_situacion = 1
            GROUP BY producto_nombre";

            $datos = Producto::fetchArray($sql);
    
            echo json_encode($datos);

        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Error al realizar la consulta',
                'codigo' => 0  
            ]);
        }

    }

}
