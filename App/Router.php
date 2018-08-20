<?php

namespace App;

use App\Controller\DefaultController;
use App\Controller\Home\HomeController;
use App\Controller\Notes\CSS\CSSController;
use App\Controller\Notes\JS\JSController;

class Router
{
    /**
     * Calls controller based on 'route name' extracted from URI.
     *
     * @return string
     */
    public function route()
    {
        $requestParts = explode('/', trim($_SERVER["REQUEST_URI"], '/'));
        $request      = end($requestParts);

        switch ($request) {
            case '':
            case 'home':
                (new HomeController())->index();
                break;
            case 'notes-css':
                (new CSSController())->index();
                break;
            case 'notes-js':
                (new JSController())->index();
                break;
            default:
                (new DefaultController())->error();
                break;
        }
    }
}
