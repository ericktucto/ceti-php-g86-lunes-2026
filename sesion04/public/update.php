<?php

require __DIR__ . '/../vendor/autoload.php';

use Tienda\Database\Conexion;

$conn = Conexion::obtener();

$precio = 3300;
$id = 4;

$sql = "UPDATE productos SET
    precio = :precio WHERE id = :id
";

try {
    $stmt = $conn->prepare($sql);
    $resultado = $stmt->execute([
        "precio" => $precio,
        "id" => $id,
    ]);

    echo "Registro actualizado correctamente.";

} catch (PDOException $e) {
    echo $e->getMessage();
}
