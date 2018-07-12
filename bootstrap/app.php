<?php

use Hector\Core\Application;
use Hector\Core\Container\Container;
use Hector\Core\Http\Contract\KernelInterface as HttpKernelInterface;
use Hector\Console\Contract\KernelInterface as ConsoleKernelInterface;
use Hector\Core\Http\Kernel as HttpKernel;
use Hector\Console\Kernel as ConsoleKernel;
use Hector\Console\Input\Contract\InputInterface;
use Hector\Console\Output\Contract\OutputInterface;
use Hector\Console\Input\ConsoleInput;
use Hector\Console\Output\ConsoleOutput;

require __DIR__ . '/../vendor/autoload.php';

$app = new Application(__DIR__.'/../');

// Store the Application as a implementation of Container
$app->instance(Container::class, $app);

// Set the HTTP kernel
$app->singleton(HttpKernelInterface::class, HttpKernel::class);

// Set the console kernel
$app->singleton(ConsoleKernelInterface::class, ConsoleKernel::class);
$app->set(InputInterface::class, ConsoleInput::class);
$app->set(OutputInterface::class, ConsoleOutput::class);

// Call the bootstrap method
$app->bootstrap();

return $app;