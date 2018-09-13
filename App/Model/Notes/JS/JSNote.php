<?php

namespace App\Model\Notes\JS;

use App\Model\PSQLTrait;

class JSNote
{
    use PSQLTrait;

    public $id;
    public $note;
    public $title;

    /**
     * JSNote constructor.
     *
     * @param array $properties
     */
    function __construct(array $properties)
    {
        $this->id    = $properties['id'];
        $this->note  = $properties['note'] ?? null;
        $this->title = $properties['title'];
    }

    /**
     * Deletes note.
     *
     * @return void
     */
    public function delete(): void
    {
        $db = self::connectPSQL();

        pg_delete($db, 'cat_note', ['note' => $this->id]);
        pg_delete($db, 'note', ['id' => $this->id]);
    }

    /**
     * Saves note.
     */
    public function save()
    {
        $db = self::connectPSQL();

        pg_update($db, 'note', get_object_vars($this), ['id' => $this->id]) or die('Query failed: ' . pg_last_error());
    }
}
