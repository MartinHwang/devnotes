<?php

include_once __DIR__ . '/../../model/notes-js/notes_js.php';

$notes_js = getNotes();
$view = __DIR__ . '/../../view/notes-js/notesJsView.php';

include __DIR__ . '/../../view/base.php';
