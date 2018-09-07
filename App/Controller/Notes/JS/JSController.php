<?php

namespace App\Controller\Notes\JS;

use App\Model\Notes\JS\JS;
use App\View;

class JSController
{
    /**
     * Displays edit form.
     *
     * @param string $noteID of note
     */
    public function edit(string $noteID)
    {
        $data['note'] = JS::fetch($noteID);

        (new View())->view('notes-js/edit', $data);
    }

    /**
     * Edits note.
     */
    public function doEdit()
    {
        $note = JS::fetch($_POST['id']);

        $note->note  = $_POST['note'] ?? null;;
        $note->title = $_POST['title'] ?? '';

        $note->save();

        $_SESSION['message'] = 'Note edited.';

        header('Location: /notes/js/show/' . $note->id, true, 303);
    }

    /**
     * Displays landing page.
     *
     * @return void
     */
    public function index(): void
    {
        $data['notes_js'] = JS::getNotes();

        (new View())->view('notes-js/index', $data);
    }

    /**
     * Displays note.
     *
     * @param string $noteID ID of note
     */
    public function show(string $noteID)
    {
        $data['note'] = JS::fetch($noteID);

        (new View())->view('notes-js/show', $data);
    }
}
