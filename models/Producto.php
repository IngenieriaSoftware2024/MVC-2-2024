<?php

namespace Model;

class Producto extends ActiveRecord
{
    protected static $tabla = 'productos';
    protected static $idTabla = 'producto_id';

    protected static $columnasDB = ['producto_nombre', 'producto_precio'];

    public $id;
    public $nombre;
    public $precio;

    

}