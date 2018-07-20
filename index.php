<?php

//echo '<pre>' . print_r(explode('/', trim($_SERVER["REQUEST_URI"], '/')), true) . '</pre>';

$request = end(explode('/', trim($_SERVER["REQUEST_URI"], '/')));

switch ($request) {
    case 'home':
        break;
    case 'notes-css':
        break;
    case 'notes-js':
        break;
    default:
        $request = 'error';
        break;
}

include 'base.php';
