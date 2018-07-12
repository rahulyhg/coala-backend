<?php

use \Hector\Console\Contract\KernelInterface;
use \Hector\Console\Input\Contract\InputInterface;
use \Hector\Console\Output\Contract\OutputInterface;

$app = require_once __DIR__.'/app.php';

$app->get(KernelInterface::class)->handle(
    $app->get(InputInterface::class),
    $app->get(OutputInterface::class)
);