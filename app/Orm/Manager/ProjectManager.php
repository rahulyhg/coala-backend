<?php

namespace App\Orm\Manager;

use App\Orm\ProjectEntity;
use Hector\Db\Orm\Manager;

class ProjectManager extends Manager
{
    const TABLE = 'project';
    const ENTITY = ProjectEntity::class;
}