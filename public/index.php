<?php

use App\Controllers\BooksController;
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
    case '/logout':
        $controller = new UserController();
        $controller->logout();
        break;
    case '/privateProfile':
        $controller = new UserController();
        $controller->index();
        break;
    case '/books' :
        $controller= new BooksController();
        $controller->index();
        break;
    case '/addBook':
        $controller = new BooksController();
        $controller->addBook();
        break;
    case '/detailBook' :
        $controller = new BooksController();
        $controller->showBook();
        break;
    default:
        $controller = new MainController();
        $controller->error();
        break;
}


