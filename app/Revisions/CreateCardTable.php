<?php

namespace App\Revisions;

use Hector\Db\Facade\Db;
use Hector\Db\QueryBuilder\Query;
use Hector\Migration\Contract\RevisionInterface;

class CreateCardTable implements RevisionInterface
{
    public function up()
    {
        $query = Query::createTable('card', [
            '`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
            '`title` varchar(255) NOT NULL',
            '`description` text NOT NULL',
            '`status` int(11) NOT NULL',
            '`user` int(11) NOT NULL',
            'FOREIGN KEY (`status`) REFERENCES `status` (`id`)',
            'FOREIGN KEY (`user`) REFERENCES `user` (`id`)',
        ]);

        Db::get()->query($query->build())->execute();
    }

    public function down()
    {
        $query = Query::dropTable('card');

        Db::get()->query($query->build())->execute();
    }

    public function describeUp(): string
    {
        return 'Table card created';
    }

    public function describeDown(): string
    {
        return 'Table card dropped';
    }
}