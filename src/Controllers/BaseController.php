<?php

namespace BasicFormApp\Controllers;

use BasicFormApp\Database\Connection;
use BasicFormApp\Database\QueryBuilder;

class BaseController
{
    /**
     * @param sring $name
     * @param array $data
     */
    public function view($name, $data = [])
    {
        require __DIR__ . '/../views/' . strtolower($name) . '.php';
    }

    /**
     * @return QueryBuilder
     */
    public function database()
    {
        $database = new QueryBuilder(Connection::make());

        return $database;
    }
}
