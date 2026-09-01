<?php

class Producto
{
    public function __construct(
        public int $id,
        public string $nombre,
        public float $precio,
    ) {}
}

class Carrito implements Iterator
{
    protected int $position = 0;
    protected array $items = [];

    public function agregar(Producto $producto)
    {
        $this->items[] = $producto;
    }

    public function rewind(): void
    {
        echo "rewind\n";
        $this->position = 0;
    }

    public function current(): Producto
    {
        echo "current\n";
        return $this->items[$this->position];
    }

    public function key(): mixed
    {
        echo "key\n";
        return $this->position;
    }

    public function next(): void
    {
        echo "next\n";
        ++$this->position;
    }

    public function valid(): bool
    {
        echo "valid\n";
        return isset($this->items[$this->position]);
    }
}

$carrito = new Carrito();

$carrito->agregar(
    new Producto(1, "Airpods", 300)
);
$carrito->agregar(
    new Producto(1, "Macbook Air 14", 3000)
);
$carrito->agregar(
    new Producto(1, "Teclado mecanico", 385)
);

foreach ($carrito as $key => $producto) {
    echo "---inicio\n";
    echo "{$producto->nombre}\n";
    echo "---fin\n";
}
