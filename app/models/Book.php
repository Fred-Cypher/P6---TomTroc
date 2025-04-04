<?php

namespace App\Models;

use DateTime;

class Book extends AbstractEntity
{
    private string $title;
    private string $author;
    private string $comment;
    private int $userId;
    private ?string $cover;
    private bool $availability;
    private DateTime $createdAt;
    private DateTime $updatedAt;
    private string $userPseudo;
    private string $userAvatar;

    public function __construct(array $data = [])
    {
        $this->hydrate($data);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getCover(): string|null
    {
        return $this->cover;
    }

    public function setCover(?string $cover): void
    {
        $this->cover = $cover;
    }

    public function getAvailability(): bool
    {
        return $this->availability;
    }

    public function setAvailability(bool $availability): void
    {
        $this->availability = $availability;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime|string $createdAt): void
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

    public function getUserPseudo(): string
    {
        return $this->userPseudo;
    }

    public function setUserPseudo(string $userPseudo): void
    {
        $this->userPseudo = $userPseudo;
    }

    public function getUserAvatar(): string
    {
        return $this->userAvatar;
    }

    public function setUserAvatar(string $userAvatar): void
    {
        $this->userAvatar = $userAvatar;
    }
}

