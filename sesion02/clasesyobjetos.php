<?php

$nombre = 'Juan';

class Producto {
    // [visibilidad] [tipo] [propiedad] = [default];
    public $nombre = "Sin nombre\n";
}

$laptop = new Producto();
echo $laptop->nombre;

$laptop->nombre = "Lenovo Thinkpad\n";
echo $laptop->nombre;

class Producto2 {
    private $nombre = "Sin nombre\n";

    // [visibilidad] function [metodo]()[: [valor]] {}
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }
}

$mouse = new Producto2();
echo $mouse->getNombre();
//$mouse->nombre = "Mouse Generico\n";
$mouse->setNombre("Mouse Generico\n");
echo $mouse->getNombre();
