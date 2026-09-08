<?php

namespace Tienda\Repositories;

interface IProductoRepository
{
    public function todos(): array;
    public function eliminar(int $id): void;
}