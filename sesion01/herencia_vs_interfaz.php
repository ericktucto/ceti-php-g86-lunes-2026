<?php // phpcs:ignore PSR1.Files.SideEffects.FoundWithSymbols

// phpcs:ignore PSR1.Classes.ClassDeclaration.MissingNamespace
interface Pagable
{
    public function calcularTotal(): float;
}

// phpcs:ignore PSR1.Classes.ClassDeclaration.MissingNamespace, PSR1.Classes.ClassDeclaration.MultipleClasses
class Producto implements Pagable
{
    private float $precio;
    private string $nombre;
    private int $cantidad;

    public function __construct(float $precio, string $nombre, int $cantidad)
    {
        $this->precio = $precio;
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
    }

    public function calcularTotal(): float
    {
        return $this->precio * $this->cantidad;
    }
}

function mostrarTotal(Pagable $pagable): void
{
    echo $pagable->calcularTotal();
}

mostrarTotal(new Producto(12, 'Mochila', 1));
