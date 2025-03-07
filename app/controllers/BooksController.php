<?php

namespace App\Controllers;

use App\Models\Book;
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
        $books = $this->booksRepository->getAllBooks();

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
                        $coverFilename = $pictureService->addPicture($_FILES['cover']);
                    } elseif ($_FILES['cover']['error'] == UPLOAD_ERR_CANT_WRITE) {
                        echo ("Erreur lors du chargement de l'image");
                    } else {
                        $coverFilename = null;
                    }

                    $title = Utils::request("title");
                    $author = Utils::request("author");
                    $comment = Utils::request("comment");
                    $availability = Utils::request("availability");
                    $createdAt = new DateTime();
                    $updatedAt = new DateTime();
                    $userId = $_SESSION['user']['id'];

                    $book = new Book([
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

                    Utils::redirect('home');
                }

            } catch (Exception $e) {
                $message = "Erreur : " . $e->getMessage();
                var_dump($message);
                die;
            }
        }

        $title = "Tom Troc - Enregistrer un livre";
        ob_start();
        require __DIR__ . '../../views/templates/addBook.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }

    public function showBook(): void
    {
        try{
            $id = Utils::request('id', -1);

            $booksRepository = new BooksRepository();
            $book = $booksRepository->getBookById($id);

            if (!$book){
                throw new Exception("Le livre demandé n'existe pas");
            } 
        } catch (Exception $e) {
            $message = "Erreur : " . $e->getMessage();
            var_dump($message);
            die;
        }
        
        $title = "Tom Troc - Détail";
        ob_start();
        require __DIR__ . '../../views/templates/detailBook.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }

    public function updateBook()
    {
            $id = Utils::request("id", -1);

            try{
                $booksRepository = new BooksRepository();
                $book = $booksRepository->getBookById($id);

                if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $title = Utils::request("title");
                    $author = Utils::request("author");
                    $comment = Utils::request("comment");
                    $availability = Utils::request("availability");
                    $updatedAt = new DateTime();

                    $params = ['images_directory' => 'uploads/covers/'];

                    $pictureService = new PictureService($params);

                    if (isset($_FILES['cover']) && $_FILES['cover']['error'] == UPLOAD_ERR_OK) {
                    if ($book->getCover() && $book->getCover() != 'defaultBook.jpg') {
                        $pictureService->deletePicture($book->getCover());
                    }
                        $coverFilename = $pictureService->addPicture($_FILES['cover']);
                    } elseif ($_FILES['cover']['error'] == UPLOAD_ERR_CANT_WRITE) {
                        echo ("Erreur lors du chargement de l'image");
                    } else {
                        $coverFilename = $book->getCover();
                    }

                    $book->setId($id);
                    $book->setTitle($title);
                    $book->setAuthor($author);
                    $book->setComment($comment);
                    $book->setCover($coverFilename);
                    $book->setAvailability($availability);
                    $book->setUpdatedAt($updatedAt);

                    $this->booksRepository->updateBook($book);

                    Utils::redirect('privateProfile');
                }
            } catch (Exception $e){
                $message = "Erreur : " . $e->getMessage();
                var_dump($message);
                die;
            }

        $title = "Tom Troc - Modifier un livre";
        ob_start();
        require __DIR__ . '../../views/templates/updateBook.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }

    public function deleteBook()
    {
        $id = Utils::request("id", -1);

        try {
            $booksRepository = new BooksRepository();
            $book = $booksRepository->getBookById($id);

            if($book){
                $coverFilename = $book->getcover();

                $booksRepository->deleteBook($id);

                if($coverFilename && $coverFilename != "defaultBook.jpg"){
                    $params = ['images_directory' => 'uploads/covers/'];
                    $pictureService = new PictureService($params);
                    $pictureService->deletePicture($coverFilename);
                }

                Utils::redirect('privateProfile');
            } else {
                throw new Exception("Livre non trouvé");
            }
        
        } catch (Exception $e) {
            $message = "Erreur : " . $e->getMessage();
            var_dump($message);
            die;
        }
    }
}