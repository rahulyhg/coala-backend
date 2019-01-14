<?php

namespace App\Orm\Manager;

use App\Orm\ClientEntity;
use Hector\Db\Orm\Manager;

class ClientManager extends Manager
{
    const TABLE = 'client';
    const ENTITY = ClientEntity::class;
}