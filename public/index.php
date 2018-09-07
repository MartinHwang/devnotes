<?php

use App\Router;
use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

(new Dotenv())->load(__DIR__ . '/../.env');

(new Router())->route();
