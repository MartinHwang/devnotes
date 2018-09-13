<?php

namespace App\Controller\Home;

use App\Model\Home\User;
use App\Model\ViewTrait;

class HomeController
{
    use ViewTrait;

    /**
     * Displays landing page.
     *
     * @return void
     */
    public function index(): void
    {
        $data['users'] = (new User)->getUsers();

        $this->view('home/homeView', $data);
    }
}
