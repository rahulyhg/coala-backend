<?php

$app->register([
    \Hector\Fs\Provider\FilesystemServiceProvider::class,
    \Hector\Session\Provider\SessionServiceProvider::class,
    \App\Provider\ConfigServiceProvider::class,
    \App\Provider\RoutingServiceProvider::class,
    \App\Provider\MigrationServiceProvider::class,
    \Hector\Db\DatabaseServiceProvider::class,
]);