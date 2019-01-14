<?php

namespace App\Revisions;

use Hector\Db\Facade\Db;
use Hector\Db\QueryBuilder\Query;
use Hector\Migration\Contract\RevisionInterface;

class CreateUserTable implements RevisionInterface
{
    public function up()
    {
        $query = Query::createTable('user', [
            '`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
            '`email` varchar(255) NOT NULL',
            '`password` varchar(255) NOT NULL',
            '`password_salt` varchar(255) NOT NULL',
        ]);

        Db::get()->query($query->build())->execute();
    }

    public function down()
    {
        $query = Query::dropTable('user');

        Db::get()->query($query->build())->execute();
    }

    public function describeUp(): string
    {
        return 'Table user created';
    }

    public function describeDown(): string
    {
        return 'Table user dropped';
    }
}