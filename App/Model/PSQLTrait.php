<?php

namespace App\Model;

trait PSQLTrait
{
    /**
     * Connects to PostgreSQL database using DotEnv variables.
     */
    private static function connectPSQL()
    {
        $dbHost = getenv('DB_HOST');
        $dbPort = getenv('DB_PORT');
        $dbName = getenv('DB_NAME');
        $dbUser = getenv('DB_USER');
        $dbPass = getenv('DB_PASS');

        // Connecting, selecting database
        $db = pg_connect("host=$dbHost port=$dbPort dbname=$dbName user=$dbUser password=$dbPass")
        or die('Could not connect: ' . pg_last_error());

        return $db;
    }
}
