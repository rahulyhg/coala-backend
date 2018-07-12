<?php

namespace App\Provider;

use Hector\Console\Facade\Console;
use Hector\Core\Container\Container;
use Hector\Core\Provider\ServiceProvider;
use Hector\Migration\Console\Command;
use Hector\Migration\ConsoleMigrationLogger;
use Hector\Migration\Contract\MigrationLoggerInterface;
use Hector\Migration\Contract\VersionStorageInterface;
use Hector\Migration\FileVersionStorage;
use Hector\Migration\Migrator;

class MigrationServiceProvider extends ServiceProvider
{
    public function register(Container $app)
    {
        $app->set(VersionStorageInterface::class, FileVersionStorage::class );
        $app->set(MigrationLoggerInterface::class, ConsoleMigrationLogger::class);
        $app->set(Migrator::class, Migrator::class);
        $app->set(Command::class, Command::class);

        $app->singleton('migrator', function() use ($app) {

            return $app->getWith(Migrator::class, [
                'versionStorage' => $app->getWith(VersionStorageInterface::class, [
                    'filename' => __DIR__.'/../../files/versions/app.txt',
                ]),
            ]);
        });

        $app->set('migrator.command', function () use ($app) {

            return $app->getWith(Command::class, [
                'name' => 'migrator',
                'migrator' => $app->get('migrator'),
            ]);
        });
    }

    public function boot(Container $app)
    {
        $app->get('migrator')->setRevisions(require __DIR__.'/../../config/revisions.php');

        Console::registerCommand('migrator.command');
    }
}