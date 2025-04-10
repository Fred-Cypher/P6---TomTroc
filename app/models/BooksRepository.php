<?php

namespace App\Models;

use DateTime;
use PDO;

class BooksRepository extends AbstractEntityManager
{
    public function addBook(Book $book): void
    {
        $sql = "INSERT INTO books (title, author, comment, cover, availability, created_at, updated_at, user_id)
        VALUES (:title, :author, :comment, :cover, :availability, :created_at, :updated_at, :user_id)";
        $this->db->query($sql, [
            'title' => $book->getTitle(),
            'author' => $book->getAuthor(),
            'comment' => $book->getComment(),
            'cover' =>$book->getCover(),
            'availability' => (int) $book->getAvailability(),
            'created_at' => $book->getCreatedAt()->format('Y-m-d H:i:s'),
            'updated_at' => $book->getUpdatedAt()->format('Y-m-d H:i:s'),
            'user_id' => $book->getUserId(),
        ]);
    }

    public function updateBook(Book $book)
    {
        $sql = "UPDATE books SET id = :id, title = :title, author = :author, comment = :comment, cover = :cover, availability = :availability,  updated_at = :updated_at
        WHERE id = :id";
        $this->db->query($sql, [
            'id' => $book->getId(),
            'title' => $book->getTitle(),
            'author' => $book->getAuthor(),
            'comment' => $book->getComment(),
            'cover' => $book->getCover(),
            'availability' => (int) $book->getAvailability(),
            'updated_at' => $book->getUpdatedAt()->format('Y-m-d H:i:s'),
        ]);
    }

    public function getAllBooks(): array
    {
        $sql = "SELECT b.id, b.title, b.author, b.comment, b.cover, b.availability, b.created_at, b.updated_at, u.id as user_id, u.pseudo as user_pseudo
        FROM books b
        JOIN users u ON b.user_id = u.id";
        $result = $this->db->query($sql);
        $books = [];
        
        while ($book = $result->fetch(PDO::FETCH_ASSOC)) {
            if($book){
                $book['cover'] = $book['cover'] ?? 'defaultBook.jpg';
                $book['created_at'] = new DateTime($book['created_at']);
                $book['updated_at'] = new DateTime($book['updated_at']);
                $book['user_pseudo'] = $book['user_pseudo'];
            }
            $books[] = new Book($book);
        }
        return $books;
    }

    public function getBookById(int $id): ?Book
    {
        $sql = "SELECT b.id, b.title, b.author, b.comment, b.cover, b.availability, b.created_at, b.updated_at, u.id as user_id, u.pseudo as user_pseudo, u.avatar as user_avatar
        FROM books b
        JOIN users u ON b.user_id = u.id
        WHERE b.id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $book = $result->fetch();
        if ($book) {
            $book['cover'] = $book['cover'] ?? 'defaultBook.jpg';
            $book['created_at'] = new DateTime($book['created_at']);
            $book['updated_at'] = new DateTime($book['updated_at']);
            $book['user_pseudo'] = $book['user_pseudo'];
            $book['user_avatar'] = $book['user_avatar'] ?? 'defaultAvatar.png';
            return new Book($book);
        }
        return null;
    }

    public function getBooksByUser(int $userId): array
    {
        $sql = "SELECT * FROM books WHERE user_id = :user_id";
        $result = $this->db->query($sql, ['user_id' => $userId]);
        $books = [];

        while ($booksData = $result->fetch()){
            $booksData['cover'] = $booksData['cover'] ?? 'defaultBook.jpg';
            if (isset($booksData['created_at']))
            {
                $booksData['created_at'] = new DateTime($booksData['created_at']);
            }
            if (isset($booksData['updated_at'])) {
                $booksData['updated_at'] = new DateTime($booksData['updated_at']);
            }
            $books[] = new Book($booksData);
        }
        return $books;
    }

    public function deleteBook(int $id): void
    {
        $sql = "DELETE FROM books WHERE id = :id";
        $this->db->query($sql, ['id' => $id]);
    }

    public function getLastFourBooksRegistered(){
        $sql = "SELECT b.id, b.title, b.author, b.comment, b.cover, b.availability, b.created_at, b.updated_at, u.id as user_id, u.pseudo as user_pseudo
        FROM books b
        JOIN users u ON b.user_id = u.id
        ORDER BY b.created_at DESC LIMIT 4 ";
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch(PDO::FETCH_ASSOC)) {
            if ($book) {
                $book['cover'] = $book['cover'] ?? 'defaultBook.jpg';
                $book['created_at'] = new DateTime($book['created_at']);
                $book['updated_at'] = new DateTime($book['updated_at']);
                $book['user_pseudo'] = $book['user_pseudo'];
            }
            $books[] = new Book($book);
        }
        return $books;
    }

    public function countBooksByUserId($userId){
        $sql = "SELECT COUNT(*) AS bookscount 
                FROM books 
                WHERE user_id = :user_id";
        $stmt = $this->db->query($sql, ['user_id' => $userId]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return (int) ($result['bookscount'] ?? 0 );
    }
}