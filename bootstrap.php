<?php

use BasicFormApp\App;
use BasicFormApp\Route;
use BasicFormApp\Database\Connection;

App::setEnvironmentalVariables();
Route::setAppRoutes();
Connection::make();
