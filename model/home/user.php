<?php

/**
 * Returns list of users.
 */
function getUsers()
{
    $dbHost = getenv('DB_HOST');
    $dbPort = getenv('DB_PORT');
    $dbName = getenv('DB_NAME');
    $dbUser = getenv('DB_USER');
    $dbPass = getenv('DB_PASS');

    // Connecting, selecting database
    $dbconn = pg_connect("host=$dbHost port=$dbPort dbname=$dbName user=$dbUser password=$dbPass")
    or die('Could not connect: ' . pg_last_error());

    // Performing SQL query
    $query = 'SELECT * FROM "user"';
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());

    return $result;

    // Free resultset
    // pg_free_result($result);

    // Closing connection
    // pg_close($dbconn);
}
