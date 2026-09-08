<?php

namespace Tienda\Repositories;

use Override;
use Tienda\Entities\Producto;

class ProductoHttpRepository implements IProductoRepository
{
    public function __construct(
        private HttpClient $client,
    )
    {
    }

    #[Override]
    public function todos(): array
    {
        return $this->client->get('http://localhost:8881/api/productos')->getArray();
    }
}
