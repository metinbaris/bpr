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
        $pdo = Connection::make();
        $database = new QueryBuilder($pdo);

        return $database;
    }

    /**
     * @param string $url
     */
    protected function redirect($url)
    {
        header('Location: ' . $url);
    }

    /**
     * @param string $sessionName
     * @param string $value
     */
    protected function sessionPut($sessionName, $value)
    {
        session_start();
        $_SESSION[ $sessionName ] = $value;
    }

    /**
     * @param string $tableName
     * @param array $array
     */
    protected function store($tableName, $array)
    {
        $this->database()->insert($tableName, $array);
    }
}
