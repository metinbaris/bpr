<?php

namespace BasicFormApp\Controllers;

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
}