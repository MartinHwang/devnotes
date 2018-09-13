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

        switch ($requestParts[0]) {
            case '':
            case 'home':
                (new HomeController())->index();
                break;
            case 'notes':
                switch ($requestParts[1]) {
                    case 'css':
                        $controller = new CSSController();
                        $request    = $requestParts[2] ?? null;

                        switch ($request) {
                            case 'edit':
                                $controller->edit($requestParts[3]);
                                break;
                            case 'doEdit':
                                $controller->doEdit();
                                break;
                            case 'show':
                                $controller->show($requestParts[3]);
                                break;
                            case 'delete':
                                $controller->delete($requestParts[3]);
                                break;
                            case 'doDelete':
                                $controller->doDelete();
                                break;
                            default:
                                $controller->index();
                                break;
                        }
                        break;
                    case 'js':
                        $controller = new JSController();
                        $request    = $requestParts[2] ?? null;

                        switch ($request) {
                            case 'edit':
                                $controller->edit($requestParts[3]);
                                break;
                            case 'doEdit':
                                $controller->doEdit();
                                break;
                            case 'show':
                                $controller->show($requestParts[3]);
                                break;
                            case 'delete':
                                $controller->delete($requestParts[3]);
                                break;
                            case 'doDelete':
                                $controller->doDelete();
                                break;
                            default:
                                $controller->index();
                                break;
                        }
                        break;
                }
                break;
            default:
                (new DefaultController())->error();
                break;
        }
    }
}
