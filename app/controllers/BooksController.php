<?php

namespace App\Controllers;

use App\Models\Books;
use App\Models\BooksRepository;
use App\services\PictureService;
use App\services\Utils;
use DateTime;
use Exception;

class BooksController
{
    private $booksRepository;

    public function __construct(){
        $this->booksRepository = new BooksRepository;
    }

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
                    echo ("Vous devez être connecté pour enregistrer un nouveau livre");
                } else {
                    $params = ['images_directory' => 'uploads/covers/'];

                    $pictureService = new PictureService($params);

                    if (isset($_FILES['cover']) && $_FILES['cover']['error'] == UPLOAD_ERR_OK){
                        $coverFilename = $pictureService->addCover($_FILES['cover']);
                    } else {
                        echo ("Erreur lors du chargement de l'image");
                    }

                    $title = Utils::request("title");
                    $author = Utils::request("author");
                    $comment = Utils::request("comment");
                    $availability = Utils::request("availability");
                    $createdAt = new DateTime();
                    $updatedAt = new DateTime();
                    $userId = $_SESSION['user']['id'];

                    $book = New Books([
                        'title' => $title,
                        'author' => $author,
                        'comment' => $comment,
                        'cover' => $coverFilename,
                        'availability' => $availability,
                        'created_at' => $createdAt,
                        'updated_at' => $updatedAt,
                        'user_id' => $userId
                    ]);
                    
                    $this->booksRepository->addBook($book);

                    header('location: /');
                    exit();
                }

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