<?php

namespace App\Controller\Home;

use App\Model\Home\User;
use App\View;

class HomeController
{
    /**
     * Displays landing page.
     *
     * @return void
     */
    public function index(): void
    {
        $data['users'] = (new User)->getUsers();

        (new View())->view('home/homeView', $data);
    }
}
