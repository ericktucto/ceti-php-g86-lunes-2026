<?php

class Producto
{
    public function __construct(
        protected string $nombre,
        protected float $precio,
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

    public function describe(): string
    {
        return "{$this->nombre} - S/ {$this->precio}";
    }
}

$laptop = new Producto("Lenovo Thinkpad", 19.9);

echo $laptop->describe() . "\n";

class ProductoDigital extends Producto
{
    public function __construct(
        protected string $nombre,
        protected float $precio,
        protected string $url = '',
    ) {}

    public function describe(): string
    {
        return parent::describe() . " {$this->url} (digital)";
    }
}

$libro = new ProductoDigital("Moby Dick", 29.9, 'https://github.com');
echo $libro->getNombre() . "\n";
echo $libro->describe() . "\n";