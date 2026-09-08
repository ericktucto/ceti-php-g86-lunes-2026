<?php

require __DIR__ . '/../vendor/autoload.php';

use Tienda\Database\Conexion;

$conn = Conexion::obtener();

$id = 4;

$sql = "DELETE FROM productos WHERE id = :id";

try {
    $stmt = $conn->prepare($sql);
    $resultado = $stmt->execute([
        "id" => $id,
    ]);

    echo "Registro eliminado correctamente.";

} catch (PDOException $e) {
    echo $e->getMessage();
}
