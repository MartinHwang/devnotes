<?php

include_once __DIR__ . '/../../model/home/user.php';

$users = getUsers();
$view = __DIR__ . '/../../view/home/homeView.php';

include __DIR__ . '/../../view/base.php';
