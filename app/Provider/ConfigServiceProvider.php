<?php

namespace App\Provider;

use Hector\Config\Contract\ConfigLoaderInterface;
use Hector\Config\Contract\ConfigRepositoryInterface;
use Hector\Core\Container\Container;
use Hector\Core\Provider\ServiceProvider;
use Hector\Config\ConfigRepository;
use Hector\Config\Loader\DotEnvLoader;
use Hector\Fs\Contract\FilesystemInterface;

class ConfigServiceProvider extends ServiceProvider
{
    public function register(Container $app)
    {
        $app->set(ConfigLoaderInterface::class, function () use ($app) {

            return new DotEnvLoader(
                $app->get(FilesystemInterface::class),
                __DIR__.'/../.env',
                __DIR__.'/../dev.env'
            );
        });

        $app->set(ConfigRepositoryInterface::class, ConfigRepository::class);
    }
}
