<?php

namespace App\Orm;

class ProjectEntity extends \Hector\Db\Orm\Entity
{
    public function getTitle()
    {
        return 'Nice one ' . $this->title;
    }
}