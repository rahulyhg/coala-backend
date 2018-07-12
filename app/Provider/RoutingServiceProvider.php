<?php

namespace App\Provider;

use Hector\Core\Container\Container;
use Hector\Core\Provider\ServiceProvider;
use Hector\Core\Routing\Contract\RouterInterface;
use Hector\Core\Routing\Router;

class RoutingServiceProvider extends ServiceProvider
{
    public function register(Container $app)
    {
        $app->singleton(RouterInterface::class, Router::class);
    }

    public function boot(Container $app)
    {
        require_once __DIR__.'/../../config/routes.php';
    }
}