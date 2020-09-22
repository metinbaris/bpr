<?php

use Bramus\Router\Router;

$router = new Router();
$router->get('/', '\BasicFormApp\Controllers\HomePageController@index');
$router->run();