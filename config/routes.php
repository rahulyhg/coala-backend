<?php

use Hector\Core\Routing\Facade\Router;

Router::get('api/v1/projects/', 'App.Controller.Api.ProjectController.index')
    ->add(new \App\Middleware\ApiMiddleware())
;

Router::get('api/v1/projects/(?<id>\d+)/', 'App.Controller.Api.ProjectController.get')
    ->add(new \App\Middleware\ApiMiddleware())
;

Router::get('api/v1/clients/', 'App.Controller.Api.ClientController.index')
    ->add(new \App\Middleware\ApiMiddleware())
;

Router::get('api/v1/clients/(?<id>\d+)/', 'App.Controller.Api.ClientController.get')
    ->add(new \App\Middleware\ApiMiddleware())
;

Router::get('api/v1/users/', 'App.Controller.Api.UserController.index')
    ->add(new \App\Middleware\ApiMiddleware())
;

Router::get('api/v1/users/(?<id>\d+)/', 'App.Controller.Api.UserController.get')
    ->add(new \App\Middleware\ApiMiddleware())
;