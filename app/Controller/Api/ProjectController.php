<?php

namespace App\Controller\Api;

use App\Orm\Manager\ProjectManager;
use Hector\Core\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        return json_encode(ProjectManager::all()->getAll());
    }

    public function get($id)
    {
        return json_encode(ProjectManager::load($id)->getOne());
    }
}