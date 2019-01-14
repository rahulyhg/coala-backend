<?php

namespace App\Orm\Manager;

use App\Orm\UserEntity;
use Hector\Db\Orm\Manager;

class UserManager extends Manager
{
    const TABLE = 'user';
    const ENTITY = UserEntity::class;
}