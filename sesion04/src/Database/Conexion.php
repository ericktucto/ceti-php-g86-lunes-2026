<?php

namespace Tienda\Database;

use PDO;
use PDOException;

final class Conexion
{
    private static ?PDO $instancia = null;

    public static function obtener(): PDO
    {
        if (self::$instancia === null) {
            self::$instancia = self::crear();
        }
        return self::$instancia;
    }

    private static function crear(): PDO
    {
        try {
            $dsn = "pgsql:host=postgres;port=5432;dbname=tienda";
            $user = "erick";
            $pass = "1234";
            return new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            dd($e->getMessage());
        }

    }
}
