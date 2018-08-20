<?php

namespace App\Controller\Notes\JS;

use App\Model\Notes\JS\JS;
use App\View;

class JSController
{
    /**
     * Displays landing page.
     *
     * @return void
     */
    public function index():void
    {
        $data['notes_js'] = (new JS)->getNotes();

        (new View())->view('notes-js/notesJsView', $data);
    }
}
