<?php

namespace App\Controllers;

class BooksController{
    public function index()
    {
        $title = "Tom Troc - Nos livres à l'échange";
        ob_start();
        require __DIR__ . '../../views/templates/books.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }
    
    public function addBook(){
        $title = "Tom Troc - Enregistrer un livre";
        ob_start();
        require __DIR__ . '../../views/templates/addBook.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }

    public function showBook()
    {
        $title = "Tom Troc - Détail";
        ob_start();
        require __DIR__ . '../../views/templates/detailBook.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }

}