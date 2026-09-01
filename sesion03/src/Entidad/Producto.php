<?php

namespace Tienda\Backend\Entidad;

class Producto
{
    public function __construct(
        public int $id,
        public string $nombre,
        public float $precio,
    ) {}
}