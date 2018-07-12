<?php

$app->register([
    \Hector\Fs\Provider\FilesystemServiceProvider::class,
    \Hector\Session\Provider\SessionServiceProvider::class,
]);

// Application specific service providers
$app->register([
    \App\Provider\ConfigServiceProvider::class,
    \App\Provider\RoutingServiceProvider::class,
    \App\Provider\MigrationServiceProvider::class,
]);