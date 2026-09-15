<?php

namespace App\Productos\Http\Controllers;

use Psr\Http\Message\ResponseInterface;
use App\Productos\Models\Product;
use GuzzleHttp\Psr7\Response;
use Illuminate\Database\ConnectionResolverInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProductoController
{
    public function __construct(ConnectionResolverInterface $resolver)
    {
        Product::setConnectionResolver($resolver);
    }

    public function index(): ResponseInterface
    {
        $productos = Product::all();
        $body = json_encode($productos->toArray());
        return new Response(200, ['Content-Type' => 'application/json'], $body);
    }

    public function store(ServerRequestInterface $request): ResponseInterface
    {
        $body = json_decode($request->getBody()->getContents(), true);
        $product = new Product();
        $product->name = $body['name'];
        $product->price = (float) $body['price'];
        $product->save();

        return new Response(201, ['Content-Type' => 'application/json'], json_encode($product->toArray()));
    }
}