<?php

namespace App\Admin\Http\Middlewares;

use App\Admin\Models\User;
use App\Core\Response;
use App\Services\Contracts\JWTInterface;
use Illuminate\Database\ConnectionResolverInterface;
use Override;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class AuthMiddleware implements MiddlewareInterface
{
    public function __construct(
        protected JWTInterface $jwt,
        protected ConnectionResolverInterface $resolver,
    ) {
        User::setConnectionResolver($resolver);
    }

    #[Override]
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $headers = $request->getHeader('Authorization');
        if (count($headers) === 0) {
            return Response::json(['message' => 'Unauthorized'], 401);
        }
        $splitted = explode(' ', $headers[0]);
        if (count($splitted) !== 2) {
            return Response::json(['message' => 'Unauthorized'], 401);
        }

        $token = $splitted[1];

        try {
            if (!$this->jwt->verify($token)) {
                return Response::json(['message' => 'Unauthorized'], 401);
            }

            $decoded = $this->jwt->decode($token);

            /** @var ?User $user */
            $user = User::query()->find($decoded['data']->id);
            if (!$user) {
                return Response::json(['message' => 'Unauthorized'], 401);
            }
        } catch (\Exception $e) {
            return Response::json(['message' => 'Unauthorized'], 401);
        }

        return $handler->handle($request);
    }
}
