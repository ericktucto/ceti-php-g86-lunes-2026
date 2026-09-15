<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

class HomeController
{
    public function index(): ResponseInterface
    {
        return new Response(200, [], 'Hola mundo');
    }
}