<?php

include_once 'model/notes-js/notes_js.php';

$notes_js = getNotes();
$view = 'view/notes-js/notesJsView.php';

include 'view/base.php';
