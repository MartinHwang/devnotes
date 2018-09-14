<?php

namespace App\Model\Notes\CSS;

use App\Model\PSQLTrait;

class CSS
{
    use PSQLTrait;

    /**
     * Stores and returns CSSNote.
     *
     * @param array $properties
     *
     * @return CSSNote
     */
    public static function create(array $properties): CSSNote
    {
        $db = self::connectPSQL();

        $params = [
            $properties['note'],
            $properties['title'],
        ];

        $sql     = 'INSERT INTO "note" ("note", "title") VALUES ($1, $2) RETURNING "id", "note", "title"';
        $query   = pg_query_params($db, $sql, $params);
        $results = pg_fetch_assoc($query);

        pg_insert($db, 'cat_note', ['cat' => 1, 'note' => $results['id']]);

        return new CSSNote($results);
    }

    /**
     * Returns specified note.
     *
     * @param string $noteID ID of note
     *
     * @return CSSNote
     */
    public static function fetch(string $noteID): CSSNote
    {
        $db = self::connectPSQL();

        $query = '
            SELECT *
            FROM "note"
            WHERE "id" = $1';

        $result     = pg_query_params($db, $query, [$noteID]) or die('Query failed: ' . pg_last_error());
        $properties = pg_fetch_assoc($result);

        return new CSSNote($properties);
    }

    /**
     * Returns list of CSS notes.
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
            WHERE cat."id" = 1
            ORDER BY "note"."title"';

        $result = pg_query($query) or die('Query failed: ' . pg_last_error());

        return $result;
    }
}
