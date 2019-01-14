<?php

use Hector\Core\Routing\Facade\Router;

Router::get('', 'App.Controller.DbTest.index');
Router::get('example/', 'App.Controller.Example.index');