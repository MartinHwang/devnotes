<?php

namespace App\Model;

trait ViewTrait
{
    /**
     * Returns view.
     *
     * @param string     $view View template
     * @param null|array $data Variables to use in view template
     *
     * @return void
     */
    public function view(string $view, ?array $data = []): void
    {
        $message = $_SESSION['message'] ?? null;

        extract($data);

        $contents = __DIR__ . "/../../view/{$view}.php";

        include __DIR__ . "/../../view/base.php";

        unset($_SESSION['message']);
    }
}
