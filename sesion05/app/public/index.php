<?php declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Admin\Http\Controllers\AdminController;
use App\Admin\Http\Middlewares\AuthMiddleware;
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
// authentication
$authMiddleware = $app->container->make(AuthMiddleware::class);
$app->router()->post('/api/v1/admin/login', [AdminController::class, 'login']);
$app->router()->post('/api/v1/admin/register', [AdminController::class, 'register']);
//$app->router()->post('/api/v1/admin/me', [AdminController::class, 'me']);
//$app->router()->post('/api/v1/admin/refreshToken', [AdminController::class, 'refreshToken']);

// productos
$app->router()->get('/api/v1/products', [ProductoController::class, 'index']);
$app->router()->post('/api/v1/products', [ProductoController::class, 'store'])->middleware(
    $authMiddleware,
);
$app->router()->delete('/api/v1/products/{id}', [ProductoController::class, 'delete'])->middleware(
    $authMiddleware,
);

// ejecutar
$app->run();
