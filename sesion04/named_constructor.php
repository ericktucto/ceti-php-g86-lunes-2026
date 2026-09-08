<?php

require __DIR__ . '/vendor/autoload.php';

class Usuario
{
    public function __construct(
        public string $nombre,
        public string $correo,
        public bool $correo_verificado = false,
    )
    {
    }

    public static function crearConCorreoVerificado(
        string $nombre,
        string $correo,
    ): static {
        return new static(
            $nombre,
            $correo,
            true,
        );
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['nombre'],
            $data['correo'],
            $data['correo_verificado'] ?? false,
        );
    }
}

$pedro = new Usuario("Pedro", "pedro@gmail.com");

$juan = new Usuario("Juan", "juan@gmail.com", true);

$ana = Usuario::crearConCorreoVerificado("Ana", "ana@gmail.com");

dump(
    $pedro,
    $juan,
    $ana
);

class Administrador extends Usuario
{
    private bool $es_admin = true;
}

$admin = Administrador::crearConCorreoVerificado("Tom", "tom@gmail.com");

dump($admin);

// conexion base de datos
// consulta
// obtenemos un registro

$resultado = [
    "nombre" => "Erick",
    "correo" => "erick@ericktucto.com",
    "correo_verificado" => true
];

$usuario1 = Usuario::fromArray($resultado);

dump($usuario1);

