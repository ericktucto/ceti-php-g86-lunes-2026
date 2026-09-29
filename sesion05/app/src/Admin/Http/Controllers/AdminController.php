<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Models\User;
use App\Services\Contracts\JWTInterface;
use GuzzleHttp\Psr7\Response;
use Illuminate\Database\ConnectionResolverInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AdminController
{
    public function __construct(
        private JWTInterface $jwt,
        ConnectionResolverInterface $resolver
    ) {
        User::setConnectionResolver($resolver);
    }

    public function register(ServerRequestInterface $request): ResponseInterface
    {
        $body = json_decode($request->getBody()->getContents(), true);

        if (User::query()->where('email', $body['email'])->get()->count() > 0) {
            return new Response(422, ['Content-Type' => 'application/json'], json_encode([
                'errors' => ['El correo ya esta en uso']
            ]));
        }


        $user = new User();
        $user->name = $body['name'];
        $user->email = $body['email'];
        $user->password = password_hash($body['password'], PASSWORD_BCRYPT);
        $user->save();

        return new Response(201, ['Content-Type' => 'application/json'], json_encode($user->toArray()));
    }

    public function login(ServerRequestInterface $request): ResponseInterface
    {
        $body = json_decode($request->getBody()->getContents(), true);

        $user = User::query()->where('email', $body['email'])->first();

        if (!$user) {
            return new Response(422, ['Content-Type' => 'application/json'], json_encode([
                'errors' => ['Credenciales incorrectas']
            ]));
        }

        $check = password_verify($body['password'], $user->password);

        if (!$check) {
            return new Response(422, ['Content-Type' => 'application/json'], json_encode([
                'errors' => ['Credenciales incorrectas']
            ]));
        }

        $body = [
            'token' => $this->jwt->encode([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ])
        ];

        return new Response(201, ['Content-Type' => 'application/json'], json_encode($body));
    }
}
