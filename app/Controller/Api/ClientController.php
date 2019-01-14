<?php

namespace App\Controller\Api;

use App\Orm\Manager\ClientManager;
use Hector\Core\Controller;

class ClientController extends Controller
{
    public function index()
    {
        return json_encode(ClientManager::all()->getAll());
    }

    public function get($id)
    {
        return json_encode(ClientManager::load($id)->getOne());
    }
}