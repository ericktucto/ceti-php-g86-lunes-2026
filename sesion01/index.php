<?php

$noexiste = null;
$nombre = "Erick Tucto";
$edad = 18;
$precio = 19.9;
$activo = true;
$email = null;

echo $noexiste;
var_dump($noexiste, $nombre, $edad, $precio, $activo);
echo "</br>";
echo "Hola, soy {$nombre}, tengo {$edad} años, compre un mochila a {$precio}";
echo "</br>";
echo 'Hola, soy {$nombre}, tengo {$edad} años, compre un mochila a {$precio}';


// OPERACIONES
// ARITMETICOS
echo "</br>";
echo "OPERACIONES";
echo "</br>";

var_dump(14 + 5);
var_dump(14 - 5);
var_dump(14 * 5);
var_dump(14 / 5);
var_dump(14 % 5);

echo "</br>";
echo "OPERACIONES: COMPARACION";
echo "</br>";

var_dump(5 == 5);
echo "<br>";
var_dump(5 == "5");
echo "<br>";
var_dump(14 > 5);
var_dump(5 > 5);
echo "</br>";
var_dump(2 < 5);
echo "<br>5 < 5 <br>";
var_dump(5 < 5);
echo "<br>";
var_dump(5 >= 5);
echo "<br>";
var_dump(15 <= 5);
echo "<br>";
var_dump(6 != 5);
echo "<br>5 === 5 <br>";
var_dump(5 === 5);
echo "<br>5 === '5' <br>";
var_dump(5 === "5");
echo "<br>";

echo "<br>OPERADORES LOGICOS<br>";
var_dump(true && true);
echo "<br>";
var_dump(true && false);
echo "<br>";
var_dump(false && true);
echo "<br>";
var_dump(false && false);

echo "<br>||<br>";
var_dump(true || true);
echo "<br>";
var_dump(true || false);
echo "<br>";
var_dump(false || true);
echo "<br>";
var_dump(false || false);


echo "<br>OPERADOR NEGACION<br>";
var_dump(!true);
echo "<br>";
var_dump(!false);

echo "<br>OPERADOR CONCATENACION<br>";
$inicio = "<br>OPERADOR";
$final = " USANDO EL PUNTO<br>";
echo $inicio . $final;

if (true) {
    echo "<br>dentro de condicional if(true)<br>";
}

echo "<br>CONDICIONALES<br>";
$edad = 18;
if ($edad >= 18) {
    echo "<br>eres mayor de edad<br>";
    // codigo para hacer inicio de sesion
    // o hacer registro
}

$dia = "jueves";

switch ($dia) {
    case 'lunes':
        echo "<br>es lunes<br>";
        break;
    case 'martes':
        echo "<br>es martes<br>";
        break;
    default:
        echo "<br>es otro dia<br>";
        break;
}

echo "<br>BUCLES<br>";
echo "<br>FOR<br>";
for ($i = 0; $i < 15; $i++) {
    if ($i % 3 == 0) {
        echo "<br>es multiplo de tres<br>";
        continue;
    }
    if ($i == 10) {
        echo "<br>fin del bucle<br>";
        break;
    }
    echo "<br>valor: {$i}<br>";
}

echo "<br>WHILE<br>";
$a = 0;
while ($a <= 10) {
    if ($a % 3 == 0) {
        echo "<br>es multiplo de tres<br>";
        $a++;
        continue;
    }
    if ($a == 10) {
        echo "<br>fin del bucle<br>";
        break;
    }
    echo "<br>valor: {$a}<br>";
    $a++;
}