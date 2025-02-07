<?php

namespace App\Models;

class BooksRepository extends AbstractEntityManager
{
    function addBook(Books $books): void{
        $sql = "INSERT INTO books (title, author, comment, cover, availability, created_at, updated_at, user_id)
        VALUES (:title, :author, :comment, :cover, :availability, :created_at, :updated_at, :user_id)";
        $this->db->query($sql, [
            'title' => $books->getTitle(),
            'author' => $books->getAuthor(),
            'comment' => $books->getComment(),
            'cover' =>$books->getCover(),
            'availability' => $books->getAvailability(),
            'created_at' => $books->getCreatedAt()->format('Y-m-d H:i:s'),
            'updated_at' => $books->getUpdatedAt()->format('Y-m-d H:i:s'),
            'user_id' => $books->getUserId(),
        ]);
    }
}