<?php

namespace App\Core;

use DI\Container;
use DI\ContainerBuilder;
use League\Route\Router;
use Yiisoft\PsrEmitter\SapiEmitter;

class Application
{
    public Container $container;
    public ?Router $router = null;

    public function __construct(
        array $definitions,
    ) {
        $builder = new ContainerBuilder();
        $builder->addDefinitions($definitions);
        $this->container = $builder->build();
    }

    public function router(): Router
    {
        if ($this->router) return $this->router;
        return $this->router = $this->container->get('router');
    }

    public function run(): void
    {
        // request
        $request = $this->container->get('request');

        // response
        $response = $this->router()->dispatch($request);

        // emitter
        new SapiEmitter()->emit($response);
    }
}
