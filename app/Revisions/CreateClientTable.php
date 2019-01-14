<?php

namespace App\Revisions;

use Hector\Db\Facade\Db;
use Hector\Db\QueryBuilder\Query;
use Hector\Migration\Contract\RevisionInterface;

class CreateClientTable implements RevisionInterface
{
    public function up()
    {
        $query = Query::createTable('client', [
            '`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
            '`name` varchar(255) NOT NULL',
        ]);

        Db::get()->query($query->build())->execute();
    }

    public function down()
    {
        $query = Query::dropTable('client');

        Db::get()->query($query->build())->execute();
    }

    public function describeUp(): string
    {
        return 'Table client created';
    }

    public function describeDown(): string
    {
        return 'Table client dropped';
    }
}