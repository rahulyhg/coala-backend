<?php

namespace App\Revisions;

use Hector\Db\Facade\Db;
use Hector\Db\QueryBuilder\Query;
use Hector\Migration\Contract\RevisionInterface;

class CreateProjectTable implements RevisionInterface
{
    public function up()
    {
        $query = Query::createTable('project', [
            '`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
            '`title` varchar(255) NOT NULL',
            '`slug` varchar(255) NOT NULL',
        ]);

        Db::get()->query($query->build())->execute();
    }

    public function down()
    {
        $query = Query::dropTable('project');

        Db::get()->query($query->build())->execute();
    }

    public function describeUp(): string
    {
        return 'Table page created';
    }

    public function describeDown(): string
    {
        return 'Table page dropped';
    }
}