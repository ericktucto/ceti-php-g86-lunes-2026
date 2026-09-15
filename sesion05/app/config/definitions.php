<?php

use App\Core\Definitions\ClaseDefinition;
use App\Core\Definitions\ConnectionDefinition;
use App\Core\Definitions\RouterDefinition;
use App\EjemploInterface;
use GuzzleHttp\Psr7\ServerRequest;
use Illuminate\Database\ConnectionResolverInterface;

use function DI\factory;

return [
    EjemploInterface::class => factory([ClaseDefinition::class, 'create']),
    'request' => fn() => ServerRequest::fromGlobals(),
    'router' => factory([RouterDefinition::class, 'create']),
    ConnectionResolverInterface::class => factory([ConnectionDefinition ::class, 'create']),
    'config_database' => [
        'default' => 'pg',
        'pg' => [
            'driver' => 'pgsql',
            'user' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'host' => $_ENV['DB_HOST'],
            'dbname' => $_ENV['DB_DATABASE'],
        ],
    ],
];
