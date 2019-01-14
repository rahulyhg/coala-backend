<?php

namespace App\Controller;

use Hector\Core\Controller;
use Hector\Session\Facade\Session;

class Example extends Controller
{
    public function index()
    {
        $visits = Session::get('visits')+1;

        Session::set('visits', $visits);
        Session::save();

        return 'Welcome to your application, you visited this example page '.$visits.' times.';
    }
}