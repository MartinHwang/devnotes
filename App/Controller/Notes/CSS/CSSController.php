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

        (new View())->view('notes-css/notesCssView', $data);
    }
}
