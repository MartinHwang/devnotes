<?php

namespace App\Controller\Notes\CSS;

use App\Model\Notes\CSS\CSS;
use App\View;

class CSSController
{
    /**
     * Displays edit form.
     *
     * @param string $noteID ID of note
     */
    public function edit(string $noteID)
    {
        $data['note'] = CSS::fetch($noteID);

        (new View())->view('notes-css/edit', $data);
    }

    /**
     * Edits note.
     */
    public function doEdit()
    {
        $note = CSS::fetch($_POST['id']);

        $note->note  = $_POST['note'] ?? null;;
        $note->title = $_POST['title'] ?? '';

        $note->save();

        $_SESSION['message'] = 'Note edited.';

        header('Location: /notes/css/show/' . $note->id, true, 303);
    }

    /**
     * Displays landing page.
     *
     * @return void
     */
    public function index(): void
    {
        $data['notes_css'] = CSS::getNotes();

        (new View())->view('notes-css/index', $data);
    }

    /**
     * Displays note.
     *
     * @param string $noteID ID of note
     */
    public function show(string $noteID)
    {
        $data['note'] = CSS::fetch($noteID);

        (new View())->view('notes-css/show', $data);
    }
}
