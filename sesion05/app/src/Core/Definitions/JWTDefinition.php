<?php

namespace App\Core\Definitions;

use App\Services\Contracts\JWTInterface;
use App\Services\JWTFirebaseService;
use Exception;

class JWTDefinition
{
    public function create(): JWTInterface
    {
        $secret = $_ENV['JWT_SECRET'] ?? null;
        if (!$secret) {
            throw new Exception('No existe JWT_SECRET');
        }
        return new JWTFirebaseService($secret);
    }
}
