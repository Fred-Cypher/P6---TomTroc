<?php

namespace App\Controllers;

use App\Models\BooksRepository;

class MainController 
{
    private $booksRepository;

    public function __construct()
    {
        $this->booksRepository = new BooksRepository;
    }
    
    public function index() {

        $books = $this->booksRepository->getAllBooks();

        $title = "Tom Troc - Accueil";
        ob_start();
        require __DIR__ . '../../views/templates/home.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }

    public function error(){
        $title = "Erreur";
        ob_start();
        require __DIR__ . '../../views/templates/error.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }
}