<?php

namespace App;

class View
{
    /**
     * Returns view.
     *
     * @param string     $view View template
     * @param array|null $data Variables to use in view template
     *
     * @return void
     */
    public function view(string $view, ?array $data = []): void
    {
        extract($data);

        $contents = __DIR__ . "/../view/{$view}.php";

        include __DIR__ . "/../view/base.php";
    }
}
