<?php

namespace App\Model\Notes\JS;

use App\Model\PSQLTrait;

class JS
{
    use PSQLTrait;

    /**
     * Stores and returns JSNote.
     *
     * @param array $properties
     *
     * @return  JSNote.
     */
    public static function create(array $properties): JSNote
    {
        $db = self::connectPSQL();

        $params = [
            $properties['note'],
            $properties['title'],
        ];

        $sql = 'INSERT INTO "note" ("note", "title") VALUES ($1, $2) RETURNING "id", "note", "title"';
        $query = pg_query_params($db, $sql, $params);
        $results = pg_fetch_assoc($query);

        pg_insert($db, 'cat_note', ['cat' => 2, 'note' => $results['id']]);

        return new JSNote($results);
    }

    /**
     * Returns specified note.
     *
     * @param string $noteID ID of note
     *
     * @return JSNote
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
            RIGHT JOIN "cat_note" AS cn ON cat."id" = cn."cat"
            LEFT JOIN "note" ON cn."note" = "note"."id"
            WHERE cat."id" = 2
            ORDER BY "note"."title"';

        $result = pg_query($query) or die('Query failed: ' . pg_last_error());

        return $result;
    }
}
