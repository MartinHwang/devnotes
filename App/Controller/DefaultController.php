<?php

namespace App\Controller;

use App\Model\ViewTrait;

class DefaultController
{
    use ViewTrait;

    /**
     * Displays error page.
     *
     * @return void
     */
    public function error(): void
    {
        $this->view('error');
    }
}
