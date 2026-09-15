<?php declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Core\Application;
use App\Http\Controllers\HomeController;
use App\Productos\Http\Controllers\ProductoController;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/../.env');

$app = new Application(
    require __DIR__ . '/../config/definitions.php',
);
/*
 * Como el contenedor hace instanciacion de clases
var_dump(
    $app->container->make(App\Foo::class)->ejm->saludar()
);
*/

// rutas
$app->router()->get('/', [HomeController::class, 'index']);
$app->router()->get('/api/v1/products', [ProductoController::class, 'index']);
$app->router()->post('/api/v1/products', [ProductoController::class, 'store']);

// ejecutar
$app->run();
