<?php

use \Hector\Core\Http\Contract\KernelInterface;
use \Hector\Core\Http\ServerRequest;

$app = require_once __DIR__.'/app.php';

$app->get(KernelInterface::class)->handle(
    ServerRequest::fromGlobals()
);