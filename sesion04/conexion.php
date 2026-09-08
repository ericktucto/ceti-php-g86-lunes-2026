<?php

require __DIR__ . '/vendor/autoload.php';

try {
    $dsn = "pgsql:host=postgres;port=5432;dbname=tienda";
    $user = "erick";
    $pass = "1234";
    $conn = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    dd($conn);

} catch (Exception $e) {
    dd($e);
}