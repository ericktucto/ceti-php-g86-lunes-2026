<?php

namespace App\Core\Definitions;

use App\Core\ResponseFactory;
use League\Route\Router;
use League\Route\Strategy\JsonStrategy;
use Psr\Container\ContainerInterface;

class RouterDefinition
{
    public function create(ContainerInterface $container): Router
    {
        $strategy = new JsonStrategy(new ResponseFactory());
        $strategy->setContainer($container);

        $router = new Router();
        $router->setStrategy($strategy);
        return $router;
    }
}