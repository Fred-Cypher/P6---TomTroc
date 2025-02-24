<?php

namespace App\Models;

use DateTime;

class BooksRepository extends AbstractEntityManager
{
    function addBook(Book $book): void
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

    function updateBook(Book $book)
    {
        $sql = "UPDATE books SET title = :title, author = :author, comment = :comment, cover = :cover, availability = :availability,  updated_at = :updated_at
        WHERE id = :id";
        $this->db->query($sql, [
            'title' => $book->getTitle(),
            'author' => $book->getAuthor(),
            'comment' => $book->getComment(),
            'cover' => $book->getCover(),
            'availability' => (int) $book->getAvailability(),
            'updated_at' => $book->getUpdatedAt()->format('Y-m-d H:i:s'),
            'id' => $book->getId(),
        ]);
    }

    function getAllBooks():array
    {
        $sql = "SELECT * FROM books";
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            if($book){
                $book['created_at'] = new DateTime($book['created_at']);
                $book['updated_at'] = new DateTime($book['updated_at']);
            }
            $books[] = new Book($book);
        }
        return $books;
    }

    function getBookById(int $id): ?Book
    {
        $sql = "SELECT * FROM books WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $book = $result->fetch();
        if ($book) {
            $book['created_at'] = new DateTime($book['created_at']);
            $book['updated_at'] = new DateTime($book['updated_at']);
            return new Book($book);
        }
        return null;
    }

    function getBooksByUser(int $userId): array
    {
        $sql = "SELECT * FROM books WHERE user_id = :user_id";
        $result = $this->db->query($sql, ['user_id' => $userId]);
        $books = [];

        while ($booksData = $result->fetch()){
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
}