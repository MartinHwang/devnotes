<?php


include_once __DIR__ . '/../../model/notes-css/notes_css.php';

$notes_css = getNotes();
$view = __DIR__ . '/../../view/notes-css/notesCssView.php';

include __DIR__ . '/../../view/base.php';
