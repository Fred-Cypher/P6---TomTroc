<?php

namespace App\Models;

use DateTime;

class User {
    private int $id;
    private string $pseudo;
    private string $email;
    private string $password;
    private int $books;
    private string $avatar;
    private string $role;
    private DateTime $createdAt;
    private ?DateTime $updatedAt;

    public function __construct($id = null, $pseudo = '', $email = '', $password = '', $books = 0, $avatar = '', $role = 'User', $createdAt = null, $updatedAt = null)
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->password = $password;
        $this->books = $books;
        $this->avatar = $avatar;
        $this->role = $role;
        $this->createdAt = $createdAt ?? date('Y-m-d H:i:s');
        $this->updatedAt = $updatedAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getBooks(): int
    {
        return $this->books;
    }

    public function setBooks(int $books): void
    {
        $this->books = $books;
    }

    public function getAvatar(): string
    {
        return $this->avatar;
    }

    public function setAvartar(string $avatar): void
    {
        $this->avatar = $avatar;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}