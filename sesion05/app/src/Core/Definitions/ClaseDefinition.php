<?php

namespace App\Core\Definitions;

use App\EjemploInterface;
use Override;

class ClaseDefinition
{
    public function create(): EjemploInterface
    {
        return new class implements EjemploInterface {
            #[Override]
            public function saludar(): int
            {
                return 7;
            }
        };
    }
}