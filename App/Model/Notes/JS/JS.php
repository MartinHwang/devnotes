<?php

namespace App\Model\Notes\JS;

use App\Model\PSQLTrait;

class JS
{
    use PSQLTrait;

    /**
     * Returns specified note.
     *
     * @param string $noteID ID of note
     *
     * @return  JSNote.
     */
    public static function fetch(string $noteID): JSNote
    {
        $db = self::connectPSQL();

        $query = '
            SELECT *
            FROM "note"
            WHERE "id" = $1';

        $result     = pg_query_params($db, $query, [$noteID]) or die('Query failed: ' . pg_last_error());
        $properties = pg_fetch_assoc($result);

        return new JSNote($properties);
    }

    /**
     * Returns list of JS notes.
     *
     * @return resource
     */
    public static function getNotes()
    {
        self::connectPSQL();

        $query = '
            SELECT "title", "note"."note", "note"."id" FROM "category" AS cat
            LEFT JOIN "cat_note" AS cn ON cat."id" = cn."cat"
            LEFT JOIN "note" ON cn."note" = "note"."id"
            WHERE cat."id" = 2
            ORDER BY "note"."title"';

        $result = pg_query($query) or die('Query failed: ' . pg_last_error());

        return $result;
    }
}
