<?php

require_once __DIR__ . '/../vendor/autoload.php';

$requestParts = explode('/', trim($_SERVER["REQUEST_URI"], '/'));
$request      = end($requestParts);

switch ($request) {
    case '':
    case 'home':
        include '../controller/home/HomeController.php';
        break;
    case 'notes-css':
        include '../controller/notes-css/NotesCSSController.php';
        break;
    case 'notes-js':
        include '../controller/notes-js/NotesJSController.php';
        break;
    default:
        include '../controller/DefaultController.php';
        break;
}
