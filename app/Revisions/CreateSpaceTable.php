<?php

namespace App\Revisions;

use Hector\Db\Facade\Db;
use Hector\Db\QueryBuilder\Query;
use Hector\Migration\Contract\RevisionInterface;

class CreateSpaceTable implements RevisionInterface
{
    public function up()
    {
        $query = Query::createTable('space', [
            '`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
            '`title` varchar(255) NOT NULL',
            '`project` int(11) NOT NULL',
            'FOREIGN KEY (`project`) REFERENCES `project` (`id`)',
        ]);

        Db::get()->query($query->build())->execute();
    }

    public function down()
    {
        $query = Query::dropTable('space');

        Db::get()->query($query->build())->execute();
    }

    public function describeUp(): string
    {
        return 'Table space created';
    }

    public function describeDown(): string
    {
        return 'Table space dropped';
    }
}