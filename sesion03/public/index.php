<?php

require __DIR__ . '/../vendor/autoload.php';

use Tienda\Backend\Carrito;
use Tienda\Backend\Entidad\Producto;

$carrito = new Carrito();

$carrito->agregar(new Producto(1, "iPhone 16 Pro", 4000));

dump($carrito);