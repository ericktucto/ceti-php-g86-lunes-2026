<?php

class Producto
{
    public function __construct(
        private string $nombre,
        private float $precio,
    ) {}

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        if (strlen($nombre) === 0 || empty($nombre)) {
            throw new Exception("No puede asignar nombres vacios.");
        }
        $this->nombre = $nombre;
    }

    public function setPrecio(float $precio): void
    {
        if ($precio > 0) {
            throw new Exception("El producto no puede tener precio menor a 0");
        }
        $this->precio = $precio;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }
}

$laptop = new Producto("Lenovo Thinkpad\n", 19.9);
echo $laptop->getNombre();
echo $laptop->getPrecio() . "\n";

$laptop->setNombre("Acer\n");

echo $laptop->getNombre();

$laptop->setNombre("Macbook Air 14\n");
echo $laptop->getNombre();
