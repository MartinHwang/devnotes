<?php

namespace App\Controller\Notes\CSS;

use App\Model\Notes\CSS\CSS;
use App\Model\ViewTrait;

class CSSController
{
    use ViewTrait;

    /**
     * Displays create form.
     */
    public function create()
    {
        $this->view('notes-css/create');
    }

    /**
     * Creates note.
     */
    public function doCreate()
    {
        $note = CSS::create($_POST);

        $_SESSION['message'] = 'Note created.';

        header("Location: /notes/css/edit/{$note->id}", true, 303);
    }

    /**
     * Displays delete confirmation.
     *
     * @param string $noteID ID of note
     */
    public function delete(string $noteID)
    {
        $data['note'] = CSS::fetch($noteID);

        $this->view('notes-css/delete', $data);
    }

    /**
     * Deletes note.
     */
    public function doDelete()
    {
        $note = CSS::fetch($_POST['id']);

        $note->delete();

        $_SESSION['message'] = 'Note deleted.';

        header('Location: /notes/css', true, 303);
    }

    /**
     * Displays edit form.
     *
     * @param string $noteID ID of note
     */
    public function edit(string $noteID)
    {
        $data['note'] = CSS::fetch($noteID);

        $this->view('notes-css/edit', $data);
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

        $this->view('notes-css/index', $data);
    }

    /**
     * Displays note.
     *
     * @param string $noteID ID of note
     */
    public function show(string $noteID)
    {
        $data['note'] = CSS::fetch($noteID);

        $this->view('notes-css/show', $data);
    }
}
