<?php declare(strict_types=1);

interface Pagable
{
    public function calcularTotal(): float;
}

class Producto implements Pagable
{
    public function __construct(
        protected string $nombre,
        protected float $precio,
        protected int $cantidad,
    ) {}

    public function calcularTotal(): float
    {
        return $this->precio * $this->cantidad;
    }
}

class Suscripcion implements Pagable
{
    public function __construct(
        protected string $nombre,
        protected float $precio,
    ) {}

    public function calcularTotal(): float
    {
        return $this->precio;
    }
}

function mostrarTotal(Pagable $item) {
    echo $item->calcularTotal() . "\n";
}

$laptop = new Producto("Macbook Air 14", 3000, 1);
$netflix = new Suscripcion("Netflix Premium", 49.9);

mostrarTotal($laptop);
mostrarTotal($netflix);