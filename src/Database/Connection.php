<?php

namespace BasicFormApp\Database;

use PDO;

class Connection
{
    /**
     * @return PDO
     */
    public static function make()
    {
        try {
            $pdo = new PDO(getenv('DB_CONNECTION') . ':host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_DATABASE'),
                getenv('DB_USERNAME'), getenv('DB_PASSWORD'));

            return $pdo;
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
        }
    }
}
