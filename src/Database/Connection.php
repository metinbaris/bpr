<?php

namespace BasicFormApp\Database;

use PDO;

class Connection
{
    public static function make()
    {
        try {
            return new PDO(
                getenv('DB_CONNECTION') .
                ':host=' . getenv('DB_HOST') .
                ';dbname=' . getenv('DB_DATABASE'),
                getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
        }
    }
}