<?php

namespace Tienda\Repositories;

use Override;
use PDO;
use Tienda\Entities\Producto;

class ProductoDatabaseRepository implements IProductoRepository
{
    public function __construct(
        private PDO $conn,
    )
    {
    }

    #[Override]
    public function todos(): array
    {
        $sql = "SELECT id, nombre, precio, stock, descripcion FROM productos";
        // traer todo
        $stmt = $this->conn->query($sql);
        return array_map(
            fn ($fila) => Producto::fromArray($fila),
            $stmt->fetchAll()
        );
    }

    #[Override]
    public function eliminar(int $id): void
    {
        $sql = "DELETE FROM productos WHERE id = :id";

        $this->conn
            ->prepare($sql)
            ->execute(compact('id'));
            //->execute([
            //    "id" => $id,
            //]);
    }
}
