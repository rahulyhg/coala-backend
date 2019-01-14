<?php

namespace App\Controller\Api;

use App\Orm\Manager\UserManager;
use Hector\Core\Controller;

class UserController extends Controller
{
    public function index()
    {
        return json_encode(UserManager::all()->getAll());
    }

    public function get($id)
    {
        return json_encode(UserManager::load($id)->getOne());
    }
}