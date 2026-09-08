<?php

require __DIR__ . '/../vendor/autoload.php';

use Tienda\Database\Conexion;

$conn = Conexion::obtener();

$nombre = 'Macbook Air 14';
$descripcion = 'Macbook reacondicionado';
$precio = 3500;
$stock = 4;

$sql = "INSERT INTO productos
    (nombre, descripcion, precio, stock) values
    (:nombre, :descripcion, :precio, :stock)
";

try {
    $stmt = $conn->prepare($sql);
    $resultado = $stmt->execute([
        "nombre" => $nombre,
        "descripcion" => $descripcion,
        "precio" => $precio,
        "stock" => $stock,
    ]);

    echo "Registro insertado correctamente.";

} catch (PDOException $e) {
    echo $e->getMessage();
}
