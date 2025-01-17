<?php

use App\Controllers\MainController;
use App\Controllers\UserController;

require_once '../autoload.php';

$db = require '../config/config.php';

$requestUri = $_SERVER['REQUEST_URI'];

if ($requestUri === '/') {
    $controller = new MainController();
    $controller->index();
} elseif ($requestUri === '/login') {
    $controller = new UserController();
    $controller->login();
} else {
    $controller = new MainController();
    $controller->error();
}


