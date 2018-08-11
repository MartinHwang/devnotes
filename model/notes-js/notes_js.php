<?php

/**
 * Returns Javascript notes.
 */
function getNotes()
{
    // Connecting, selecting database
    $dbconn = pg_connect("host='localhost' port=5432 dbname='devnotes' user='devnotes' password='devnotes'")
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
