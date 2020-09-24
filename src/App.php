<?php

namespace BasicFormApp;

use Dotenv\Dotenv;

class App
{
    public static function setEnvironmentalVariables()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();
    }
}
