<?php

namespace App\Revisions;

use Hector\Db\Facade\Db;
use Hector\Db\QueryBuilder\Query;
use Hector\Migration\Contract\RevisionInterface;

class CreateStatusTable implements RevisionInterface
{
    public function up()
    {
        $query = Query::createTable('status', [
            '`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
            '`title` varchar(255) NOT NULL',
            '`space` int(11) NOT NULL',
            'FOREIGN KEY (`space`) REFERENCES `space` (`id`)',
        ]);

        Db::get()->query($query->build())->execute();
    }

    public function down()
    {
        $query = Query::dropTable('status');

        Db::get()->query($query->build())->execute();
    }

    public function describeUp(): string
    {
        return 'Table status created';
    }

    public function describeDown(): string
    {
        return 'Table status dropped';
    }
}