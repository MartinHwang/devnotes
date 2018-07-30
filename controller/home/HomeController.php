<?php

include_once 'model/home/user.php';

$users = getUsers();
$view = 'view/home/home.php';

include 'view/base.php';
