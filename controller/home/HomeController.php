<?php

include_once 'model/home/user.php';

$users = getUsers();
$view = 'view/home/homeView.php';

include 'view/base.php';
