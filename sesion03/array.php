<?php

$numeros = [1, 2, 3];

var_dump($numeros);

$ciudades = ["lima", "quito", "la paz"];

var_dump($ciudades);

echo "{$ciudades[0]}\n";
echo "{$ciudades[1]}\n";
echo "{$ciudades[2]}\n";

$ciudades[] = "madrid";

var_dump($ciudades);

foreach ($ciudades as $key => $ciudad) {
    echo "{$ciudad}\n";
}

// $cantidad_ciudades = count($ciudades);

// for ($i = 0; $i < $cantidad_ciudades; $i++) { 
// for ($i = 0; $i <= count($ciudades); $i++) { // asegurarse de no colocar <=
for ($i = 0; $i < count($ciudades); $i++) {
    echo "=> {$ciudades[$i]}\n";
}

$numeros = array_merge($numeros, [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]);

var_dump($numeros);

function par(int $numero) {
    return $numero % 2 === 0;
}

$pares = array_filter($numeros, "par");

var_dump($pares);

var_dump(
    array_filter($numeros, function (int $numero) {
        // ...
        return $numero % 3 === 0;
    })
);

var_dump(
    array_filter(
        $numeros,
        fn(int $numero) => $numero % 3 === 0
    )
);

$multiplo = 4;

var_dump(
    array_filter($numeros, function (int $numero) use ($multiplo) {
        // ...
        return $numero % $multiplo === 0;
    })
);

$multiplo = 4;

function filter(array $numeros, Closure $callback) {
    $callback($numeros);
}

filter($numeros, function (array $numeros) use ($multiplo) {
    var_dump(
        array_filter($numeros, function (int $numero) use ($multiplo) {
            return $numero % $multiplo === 0;
        })
    );
});

$multiplo = 4;
var_dump(
    array_filter(
        $numeros,
        fn(int $numero) => $numero % $multiplo === 0
    )
);

$multiplo = 6;
filter(
    $numeros,
    fn(array $numeros) => var_dump(
        array_filter(
            $numeros,
            fn(int $numero) => $numero % $multiplo === 0
        )
    )
);

$multiplos_5 = array_filter(
    $numeros,
    fn(int $numero) => $numero % 5 === 0
);

var_dump(
    array_map(
        fn(int $numero) => $numero * 2,
        $multiplos_5
    )
);

echo implode(", ", $ciudades) . "\n";

$texto = "lima, quito, la paz, madrid";
$ciudades2 = explode(", ", $texto);

var_dump($ciudades2);

$usuario = [
    "nombre" => "Erick",
    "dni" => "12345672",
    "edad" => 18
];

var_dump($usuario);
echo "{$usuario['nombre']}\n";

foreach ($usuario as $key => $valor) {
    echo "key => {$key}, valor => {$valor}\n";
}

class Producto
{
    public function __construct(
        public int $id,
        public string $nombre,
        public float $precio,
    ) {}
}

$productos = [
    new Producto(1, "Airpods", 300),
    new Producto(2, "Macbook", 3000),
    new Producto(3, "Teclado mecanico", 350),
];

var_dump($productos);

$total = array_reduce(
    $productos,
    function (float $total, $producto) {
        $total = $producto->precio + $total;
        return $total;
    },
    0
);

echo "{$total}\n";


