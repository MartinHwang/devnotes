<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

class app
{

    public function router()
    {
        $requestParts = explode('/', trim($_SERVER["REQUEST_URI"], '/'));
        $request      = end($requestParts);

        switch ($request) {
            case '':
            case 'home':
                return '../controller/home/HomeController.php';
            case 'notes-css':
                return '../controller/notes-css/NotesCSSController.php';
            case 'notes-js':
                return '../controller/notes-js/NotesJSController.php';
            default:
                return '../controller/DefaultController.php';
        }
    }
}

(new Dotenv())->load(__DIR__ . '/../.env');

include_once (new app())->router();
