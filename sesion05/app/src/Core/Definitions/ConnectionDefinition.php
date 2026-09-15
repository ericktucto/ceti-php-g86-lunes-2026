<?php

namespace App\Core\Definitions;


use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\{Connection, ConnectionResolver};
use InvalidArgumentException;
use PDO;
use Illuminate\Database\ConnectionResolverInterface;
use Illuminate\Database\Query\Grammars\PostgresGrammar;
use Psr\Container\ContainerInterface;

class ConnectionDefinition
{
    public function create(ContainerInterface $container): ConnectionResolverInterface
    {
        $databases = $container->get("config_database");

        //$dispatcher = $container->get(Dispatcher::class);
        $connections = static::createConnections($databases/*, $dispatcher*/);

        $resolver = new ConnectionResolver($connections);
        $resolver->setDefaultConnection(
            static::getDefaultNameConnection($databases),
        );

        return $resolver;
    }


    protected static function getDefaultNameConnection(array $databases): string
    {
        if (array_key_exists("default", $databases)) {
            return $databases["default"];
        }
        $names = array_keys($databases);
        $filtered = array_values(array_filter($names, fn($name) => $name !== "default"));

        if ($filtered === []) {
            throw new InvalidArgumentException("Don't have configured database in 'databases' key");
        }

        return $filtered[0];
    }

    protected static function createConnections(array $databases/*, Dispatcher $dispatcher*/): array
    {
        $connections = [];
        foreach ($databases as $connName => $configDb) {
            // continue if is default
            if ($connName === "default") {
                continue;
            }

            $driver = $configDb["driver"];

            $conn = match ($driver) {
                "pgsql" => static::buildPostgresConnection(
                    $configDb,
                ),
                default => throw new InvalidArgumentException("Driver {$driver} not supported in '{$connName}' connection."),
            };

            //$conn->setEventDispatcher($dispatcher);
            $connections[$connName] = $conn;
        }

        return $connections;
    }

    protected static function buildPostgresConnection(array $config): Connection
    {
        $host = $config["host"];
        $dbname = $config["dbname"];
        $dsn = "pgsql:host={$host};port=5432;dbname={$dbname}";
        $user = $config["user"];
        $password = $config["password"];
        $pdo = fn() => new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

        $conn = new Connection($pdo, $dbname);
        $conn->setQueryGrammar(new PostgresGrammar($conn));
        return $conn;
    }
}
