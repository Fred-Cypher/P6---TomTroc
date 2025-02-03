<?php

namespace App\Controllers;

use App\services\Utils;
use DateTime;
use Exception;

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
        $message = '';

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            try{
                if(!isset($_SESSION['user']['id'])){
                    throw new Exception("Vous devez être connecté pour enregistrer un nouveau livre");
                }

                $title = Utils::request("title");
                $author = Utils::request("author");
                $comment = Utils::request("comment");
                $cover = Utils::request("cover");
                $availability = Utils::request("availability");
                $createdAt = new DateTime();
                $updatedAt = new DateTime();
                $userId = $_SESSION['user']['id'];
            } catch (Exception $e) {
                $message = "Erreur : " . $e->getMessage();
            }
        }

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