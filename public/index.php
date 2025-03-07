<?php

use App\Controllers\AdminController;
use App\Controllers\BooksController;
use App\Controllers\MainController;
use App\Controllers\UserController;
use App\services\Utils;

require_once '../autoload.php';

$db = require '../config/config.php';

$resquestAction = Utils::request('action');

function isAuthenticated(){
    return isset($_SESSION['user']['id']);
}

function isAdmin(){
    return (isset($_SESSION['user']['role']) && ($_SESSION['user']['role']) === 'ROLE_ADMIN');
}

switch ($resquestAction) {
    // Public access
    case '':
    case 'home' :
        $controller = new MainController();
        $controller->index();
        break;
    case 'register' :
        $controller = new UserController();
        $controller->register();
        break;
    case 'login':
        $controller = new UserController();
        $controller->login();
        break;
    case 'logout':
        $controller = new UserController();
        $controller->logout();
        break;
    case 'books' :
        $controller= new BooksController();
        $controller->index();
        break;
    case 'detailBook' :
        $controller = new BooksController();
        $controller->showBook();
        break;
    case 'publicProfile' :
        $controller = new UserController();
        $controller->showUser();
        break;
    
    // Private access
    case 'privateProfile':
        if (isAuthenticated()){
            $controller = new UserController();
            $controller->index();
        } else {
            Utils::redirect('login');
        }
        break;
    case 'addBook':
        if (isAuthenticated()){
            $controller = new BooksController();
            $controller->addBook();
        } else {
            Utils::redirect('login');
        }
        break;
    case 'updateBook':
        if (isAuthenticated()){
            $controller = new BooksController();
            $controller->updateBook();
        } else {
            Utils::redirect('login');
        }
        break;
    case 'deleteBook':
        if (isAuthenticated()){
            $controller = new BooksController();
            $controller->deleteBook();
        }
        break;
    case 'updateUser':
        if (isAuthenticated()){
            $controller = new UserController();
            $controller->updateUser();
        }

        // Admin access
    case 'admin':
        if (isAdmin()){
            $controller = new AdminController();
            $controller->index();
            break;
        }
    default:
        $controller = new MainController();
        $controller->error();
        break;
}


