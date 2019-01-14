<?php

namespace App\Middleware;

use Closure;
use Hector\Core\Http\Middleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ApiMiddleware implements MiddlewareInterface
{
    public function handle(ServerRequestInterface $request, ResponseInterface $response, Closure $next)
    {
        $response = $next($request, $response); // @TODO try catch this

        $body = $response->getBody();

        $response = new \Hector\Core\Http\Response(200, [
            'Content-type' => 'application/json',
        ]);

        $decoded = json_decode($body, true);

        if ($decoded !== null) {

            $result = [
                'success' => true,
                'result' => $decoded,
            ];

            $response->write(json_encode($result));

            return $response;
        }

        $result = [
            'success' => false,
            'error_code' => 'invalid_json',
        ];

        $result->write(json_decode($result));
    }
}