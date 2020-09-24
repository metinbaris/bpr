<?php

namespace BasicFormApp;

use Buki\Router;

class Route
{
    public static function setAppRoutes()
    {
        $router = new Router([
                'base_folder' => '../src',
                'namespaces' => ['controllers' => 'BasicFormApp\Controllers']
            ]
        );
        $router->get('/', 'HomePageController@index');
        $router->post('submit-contact-form', 'ContactFormController@submitCustomerMessage');

        $router->run();
    }
}