<?php

namespace App\Controllers;

use App\Models\BooksRepository;
use App\Models\MessagesRepository;

class MainController
{
    private BooksRepository $booksRepository;
    private $messagesRepository;

    public function __construct()
    {
        $this->booksRepository = new BooksRepository;
        $this->messagesRepository = new MessagesRepository;
    }

    public function index(): void
    {

        $books = $this->booksRepository->getLastFourBooksRegistered();

        $title = "Tom Troc - Accueil";
        ob_start();
        require __DIR__ . '../../views/templates/home.php';
        $content = ob_get_clean();
        $unreadCount = $unreadCount ?? 0;
        require __DIR__ . '../../views/layout.php';
    }

    public function error(): void
    {
        $title = "Erreur";
        ob_start();
        require __DIR__ . '../../views/templates/error.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }

    public function error401(): void
    {
        $title = "Accès refusé";
        ob_start();
        require __DIR__ . '../../views/templates/error401.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }
}