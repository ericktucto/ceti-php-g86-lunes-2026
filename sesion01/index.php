<?php

$noexiste = null;
$nombre = "Erick Tucto";
$edad = 18;
$precio = 19.9;
$activo = true;
$email = null;

echo $noexiste;
var_dump($noexiste, $nombre, $edad, $precio, $activo);
echo "</br>\n";
echo "Hola, soy {$nombre}, tengo {$edad} años, compre un mochila a {$precio}";
echo "</br>\n";
echo 'Hola, soy {$nombre}, tengo {$edad} años, compre un mochila a {$precio}';


// OPERACIONES
// ARITMETICOS
echo "</br>\n";
echo "OPERACIONES";
echo "</br>\n";

var_dump(14 + 5);
var_dump(14 - 5);
var_dump(14 * 5);
var_dump(14 / 5);
var_dump(14 % 5);

echo "</br>\n";
echo "OPERACIONES: COMPARACION";
echo "</br>\n";

var_dump(5 == 5);
echo "<br>\n";
var_dump(5 == "5");
echo "<br>\n";
var_dump(14 > 5);
var_dump(5 > 5);
echo "</br>\n";
var_dump(2 < 5);
echo "<br>5 < 5 <br>\n";
var_dump(5 < 5);
echo "<br>\n";
var_dump(5 >= 5);
echo "<br>\n";
var_dump(15 <= 5);
echo "<br>\n";
var_dump(6 != 5);
echo "<br>5 === 5 <br>\n";
var_dump(5 === 5);
echo "<br>5 === '5' <br>\n";
var_dump(5 === "5");
echo "<br>\n";

echo "<br>OPERADORES LOGICOS<br>\n";
var_dump(true && true);
echo "<br>\n";
var_dump(true && false);
echo "<br>\n";
var_dump(false && true);
echo "<br>\n";
var_dump(false && false);

echo "<br>||<br>\n";
var_dump(true || true);
echo "<br>\n";
var_dump(true || false);
echo "<br>\n";
var_dump(false || true);
echo "<br>\n";
var_dump(false || false);


echo "<br>OPERADOR NEGACION<br>\n";
var_dump(!true);
echo "<br>\n";
var_dump(!false);

echo "<br>OPERADOR CONCATENACION<br>\n";
$inicio = "<br>OPERADOR";
$final = " USANDO EL PUNTO<br>\n";
echo $inicio . $final;

if (true) {
    echo "<br>dentro de condicional if(true)<br>\n";
}

echo "<br>CONDICIONALES<br>\n";
$edad = 18;
if ($edad >= 18) {
    echo "<br>eres mayor de edad<br>\n";
    // codigo para hacer inicio de sesion
    // o hacer registro
}

$dia = "jueves";

switch ($dia) {
    case 'lunes':
        echo "<br>es lunes<br>\n";
        break;
    case 'martes':
        echo "<br>es martes<br>\n";
        break;
    default:
        echo "<br>es otro dia<br>\n";
        break;
}

echo "<br>BUCLES<br>\n";
echo "<br>FOR<br>\n";
for ($i = 0; $i < 15; $i++) {
    if ($i % 3 == 0) {
        echo "<br>es multiplo de tres<br>\n";
        continue;
    }
    if ($i == 10) {
        echo "<br>fin del bucle<br>\n";
        break;
    }
    echo "<br>valor: {$i}<br>\n";
}

echo "<br>WHILE<br>\n";
$a = 0;
while ($a <= 10) {
    if ($a % 3 == 0) {
        echo "<br>es multiplo de tres<br>\n";
        $a++;
        continue;
    }
    if ($a == 10) {
        echo "<br>fin del bucle<br>\n";
        break;
    }
    echo "<br>valor: {$a}<br>\n";
    $a++;
}
echo "\n";
