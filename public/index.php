<?php

use App\Controllers\AdminController;
use App\Controllers\BooksController;
use App\Controllers\MainController;
use App\Controllers\UserController;

require_once '../autoload.php';

$db = require '../config/config.php';

$requestUri = $_SERVER['REQUEST_URI'];

function isAuthenticated(){
    return isset($_SESSION['user']['id']);
}

function isAdmin(){
    return isset($_SESSION['user']['role']);
}

switch ($requestUri) {
    // Public access
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
    case '/books' :
        $controller= new BooksController();
        $controller->index();
        break;
    case '/detailBook' :
        $controller = new BooksController();
        $controller->showBook();
        break;
    
    // Private access
    case '/privateProfile':
        if (isAuthenticated()){
            $controller = new UserController();
            $controller->index();
        } else {
            header('Location: /login');
            exit();
        }
        break;
    case '/addBook':
        if (isAuthenticated()){
            $controller = new BooksController();
            $controller->addBook();
        } else {
            header('Location: /login');
            exit();
        }
        break;
    case '/updateBook':
        if (isAuthenticated()){
            $controller = new BooksController();
            $controller->updateBook();
        } else {
            header('Location: /login');
            exit();
        }
        break;

        // URI with action


        // Admin access
    case '/admin':
        if (isAdmin('ROLE_ADMIN')){
            $controller = new AdminController();
            $controller->index();
            break;
        }
    default:
        $controller = new MainController();
        $controller->error();
        break;
}


