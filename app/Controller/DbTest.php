<?php

namespace App\Controller;

use App\Orm\Manager\ProjectManager;
use Hector\Core\Controller;

class DbTest extends Controller
{
    public function index()
    {
        $page = ProjectManager::create();
        $page->title = 'hehe';
        $page->save();
    }
}