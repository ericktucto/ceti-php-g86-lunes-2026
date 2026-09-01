<?php

interface Pagable
{
    public function calcularTotal(): float;
}

class Producto implements Pagable
{
    public function calcularTotal(): float
    {
        return 19.9;
    }
}

$laptop = new Producto();
echo $laptop->calcularTotal() . "\n";