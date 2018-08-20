<?php

namespace App\Model\Notes\JS;

/**
 * Returns Javascript notes.
 */
class JS
{
    function getNotes()
    {
        $dbHost = getenv('DB_HOST');
        $dbPort = getenv('DB_PORT');
        $dbName = getenv('DB_NAME');
        $dbUser = getenv('DB_USER');
        $dbPass = getenv('DB_PASS');

        // Connecting, selecting database
        $dbconn = pg_connect("host='$dbHost' port=$dbPort dbname=$dbName user=$dbUser password=$dbPass")
        or die('Could not connect: ' . pg_last_error());

        // Performing SQL query
        $query = '
            SELECT "title", "note"."note" FROM "category" AS cat
            LEFT JOIN "cat_note" AS cn ON cat."id" = cn."cat"
            LEFT JOIN "note" ON cn."note" = "note"."id"
            WHERE cat."id" = 2
            ORDER BY "note"."title"';
        $result = pg_query($query) or die('Query failed: ' . pg_last_error());

        return $result;
    }
}
