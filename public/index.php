<?php

use App\Controllers\AdminController;
use App\Controllers\BooksController;
use App\Controllers\MainController;
use App\Controllers\MessagingController;
use App\Controllers\UserController;
use App\Models\MessagesRepository;
use App\services\Utils;

require_once '../autoload.php';

$db = require '../config/config.php';

$requestAction = Utils::request('action');
$searchTerm = Utils::request('search');

function defineUnreadCount($db){
    if (isset($_SESSION['user']['id'])){
        $messagesRepository = new MessagesRepository($db);
        $unreadCount = $messagesRepository->countUnreadMessages($_SESSION['user']['id']);
        define('UNREAD_COUNT', $unreadCount);
    } else {
        define('UNREAD_COUNT', 0);
    }
}

defineUnreadCount($db);

function isAuthenticated(){
    return isset($_SESSION['user']['id']);
}

function isAdmin(){
    return (isset($_SESSION['user']['role']) && ($_SESSION['user']['role']) === 'ROLE_ADMIN');
}

if(!$requestAction) {
    header("Location: index.php?action=home");
}

switch ($requestAction) {
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
        $controller->index($searchTerm);
        break;
    case 'detailBook' :
        $controller = new BooksController();
        $controller->showBook();
        break;
    case 'publicProfile' :
        $controller = new UserController();
        $controller->showUser();
        break;
    case 'error401':
        $controller = new MainController();
        $controller->error401();
        break;
    case 'deniedAccess' :
        $controller = new AdminController();
        $controller->deniedAccess();
        break;

    // Private access
    case 'privateProfile':
        if (isAuthenticated()){
            $controller = new UserController();
            $controller->index();
        } else {
            Utils::redirect('error401');
        }
        break;
    case 'addBook':
        if (isAuthenticated()){
            $controller = new BooksController();
            $controller->addBook();
        } else {
            Utils::redirect('error401');
        }
        break;
    case 'updateBook':
        if (isAuthenticated()){
            $controller = new BooksController();
            $controller->updateBook();
        } else {
            Utils::redirect('error401');
        }
        break;
    case 'deleteBook':
        if (isAuthenticated()){
            $controller = new BooksController();
            $controller->deleteBook();
        } else {
            Utils::redirect('error401');
        }
        break;
    case 'updateUser':
        if (isAuthenticated()){
            $controller = new UserController();
            $controller->updateUser();
        } else {
            Utils::redirect('error401');
        }
        break;
    case 'messages':
        if (isAuthenticated()){
            $controller = new MessagingController();
            $controller->getMessages();
        } else {
            Utils::redirect('error401');
        }
        break;
    case 'sendMessage' :
        if (isAuthenticated()){
            $controller = new MessagingController();
            $controller->sendMessage();
        } else {
            Utils::redirect('error401');
        }
        break;

        // Admin access
    case 'admin':
        if (isAdmin()){
            $controller = new AdminController();
            $controller->index();
        } else {
            Utils::redirect('deniedAccess');
        }
        break;
    default:
        $controller = new MainController();
        $controller->error();
        break;
}


