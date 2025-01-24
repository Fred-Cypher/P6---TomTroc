<?php

use App\Controllers\MainController;
use App\Controllers\UserController;

require_once '../autoload.php';

$db = require '../config/config.php';

$requestUri = $_SERVER['REQUEST_URI'];

switch ($requestUri) {
    case '/' :
        $controller = new MainController();
        $controller->index();
        break;
    case '/register' :
        $controller = new UserController();
        $controller->register();
        break;
    case '/login':
        $controller = new UserController();
        $controller->login();
        break;
    default:
        $controller = new MainController();
        $controller->error();
        break;
}


