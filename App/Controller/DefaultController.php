<?php

namespace App\Controller;

use App\View;

class DefaultController
{
    /**
     * Displays error page.
     *
     * @return void
     */
    public function error(): void
    {
        (new View())->view('error');
    }
}
