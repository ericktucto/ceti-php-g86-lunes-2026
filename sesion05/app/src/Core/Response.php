<?php

namespace App\Core;

use GuzzleHttp\Psr7\Response as Psr7Response;

class Response
{
    public static function json(array $data, int $status = 200)
    {
        return new Psr7Response($status, ['Content-Type' => 'application/json'], json_encode($data));
    }
}