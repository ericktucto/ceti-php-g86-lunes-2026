<?php

namespace Tienda\Entities;

class Producto
{
    public function __construct(
        private string $nombre,
        private float $precio,
        private int $stock,
        private string $descripcion,
        private int $id,
    ) {}

    // GETTERS
    public function getId(): int
    {
        return $this->id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['nombre'],
            (float) $data['precio'],
            (int) $data['stock'],
            $data['descripcion'] ?? '',
            (int) $data['id'],
        );
    }
}

