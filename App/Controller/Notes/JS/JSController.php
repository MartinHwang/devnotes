<?php

namespace App\Controller\Notes\JS;

use App\Model\Notes\JS\JS;
use App\Model\ViewTrait;

class JSController
{
    use ViewTrait;

    /**
     * Displays create form.
     */
    public function create()
    {
        $this->view('notes-js/create');
    }

    /**
     * Creates note.
     */
    public function doCreate()
    {
        $note = JS::create($_POST);

        $_SESSION['message'] = 'Note created.';

        header("Location: /notes/js/edit/{$note->id}", true, 303);
    }

    /**
     * Displays delete confirmation.
     *
     * @param string $noteID ID of note
     */
    public function delete(string $noteID)
    {
        $data['note'] = JS::fetch($noteID);

        $this->view('notes-js/delete', $data);
    }

    /**
     * Deletes note.
     */
    public function doDelete()
    {
        $note = JS::fetch($_POST['id']);

        $note->delete();

        $_SESSION['message'] = 'Note deleted.';

        header('Location: /notes/js', true, 303);
    }

    /**
     * Displays edit form.
     *
     * @param string $noteID of note
     */
    public function edit(string $noteID)
    {
        $data['note'] = JS::fetch($noteID);

        $this->view('notes-js/edit', $data);
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

        $this->view('notes-js/index', $data);
    }

    /**
     * Displays note.
     *
     * @param string $noteID ID of note
     */
    public function show(string $noteID)
    {
        $data['note'] = JS::fetch($noteID);

        $this->view('notes-js/show', $data);
    }
}
