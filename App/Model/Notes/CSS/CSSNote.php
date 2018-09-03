<?php

namespace App\Model\Notes\CSS;

use App\Model\PSQLTrait;

class CSSNote
{
    use PSQLTrait;

    public $id;
    public $note;
    public $title;

    /**
     * CSSNote constructor.
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
     * Saves note.
     */
    public function save()
    {
        $db = self::connectPSQL();

        pg_update($db, 'note', get_object_vars($this), ['id' => $this->id]) or die('Query failed: ' . pg_last_error());
    }
}
