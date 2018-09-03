<?php

namespace App\Model\Notes\CSS;

use App\Model\PSQLTrait;

/**
 * Returns CSS notes.
 */
class CSS
{
    use PSQLTrait;

    /**
     * Returns CSS notes.
     *
     * @return resource
     */
    public function getNotes()
    {
        $this->connectPSQL();

        $query = '
            SELECT "title", "note"."note", "note"."id" FROM "category" AS cat
            LEFT JOIN "cat_note" AS cn ON cat."id" = cn."cat"
            LEFT JOIN "note" ON cn."note" = "note"."id"
            WHERE cat."id" = 1
            ORDER BY "note"."title"';

        $result = pg_query($query) or die('Query failed: ' . pg_last_error());

        return $result;
    }

    /**
     * Returns specified note.
     *
     * @param string $note ID of note
     *
     * @return resource
     */
    public function note(string $note)
    {
        $db = $this->connectPSQL();

        $query = '
            SELECT *
            FROM "note"
            WHERE "id" = $1';

        $result = pg_query_params($db, $query, [$note]) or die('Query failed: ' . pg_last_error());

        return $result;
    }
}

