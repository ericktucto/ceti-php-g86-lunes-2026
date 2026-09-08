<?php

require __DIR__ . '/../vendor/autoload.php';

use Tienda\Database\Conexion;
use Tienda\Entities\Producto;

$conn = Conexion::obtener();

$sql = "SELECT id, nombre, precio, stock, descripcion FROM productos";

try {
    // traer todo
    $stmt = $conn->query($sql);
    $productos = array_map(
        fn ($fila) => Producto::fromArray($fila),
        $stmt->fetchAll()
    );

?>

<ul>
    <?php foreach($productos as $producto): ?>
    <li><?= $producto->getId() . " - " . $producto->getNombre() ?></li>
    <?php endforeach; ?>
</ul>


<?php
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $id = 2;
    // el registro 2
    $stmt = $conn->prepare(
        "SELECT id, nombre, precio, stock, descripcion FROM productos WHERE id = ?"
    );

    
    $stmt->execute([$id]);

    $producto = Producto::fromArray($stmt->fetch());
?>

<div><?= $producto->getNombre() ?></div>

<?php
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>