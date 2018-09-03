<?php

namespace App\Controller\Notes\CSS;

use App\Model\Notes\CSS\CSS;
use App\View;

class CSSController
{
    /**
     * Displays landing page.
     *
     * @return void
     */
    public function index(): void
    {
        $data['notes_css'] = (new CSS)->getNotes();

        (new View())->view('notes-css/index', $data);
    }

    /**
     * Displays edit form.
     *
     * @param string $note ID of note
     */
    public function edit(string $note)
    {
        echo "Note ID: $note";
    }

    /**
     * Displays note.
     *
     * @param string $note ID of note
     */
    public function show(string $note)
    {
        $noteData = (new CSS)->note($note);

        $data['note'] = pg_fetch_assoc($noteData);

        (new View())->view('notes-css/show', $data);
    }
}
