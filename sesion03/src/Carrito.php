<?php

namespace Tienda\Backend;

use Iterator;
use Tienda\Backend\Entidad\Producto;

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
        $this->position = 0;
    }

    public function current(): Producto
    {
        return $this->items[$this->position];
    }

    public function key(): mixed
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function valid(): bool
    {
        return isset($this->items[$this->position]);
    }
}