<?php

/**
 * Returns list of users.
 */
function getUsers()
{
    // Connecting, selecting database
    $dbconn = pg_connect("host='localhost' port=5432 dbname='devnotes' user='devnotes' password='devnotes'")
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
