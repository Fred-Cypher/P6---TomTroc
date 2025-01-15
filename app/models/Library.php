<?php

namespace App\Models;

use DateTime;

class Library {
    private int $id;
    private string $title;
    private string $authorFirstName;
    private string $authorName;
    private string $description;
    private int $userId;
    private string $cover;
    private bool $availability;
    private DateTime $createdAt;
    private ?DateTime $updatedAt;

    public function __construct($id = null, $title = '', $authorFirstName = '', $authorName = '', $description = '', $userId = null, $cover = '', $availability = 1, $createdAt = null, $updatedAt = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->authorFirstName = $authorFirstName;
        $this->authorName = $authorName;
        $this->description = $description;
        $this->userId = $userId;
        $this->cover = $cover;
        $this->availability = $availability;
        $this->createdAt = $createdAt ?? date('Y-m-d H:i:s');
        $this->updatedAt = $updatedAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getAuthorFirstName(): string
    {
        return $this->authorFirstName;
    }

    public function setAuthorFirstName(string $authorFirstName): void
    {
        $this->authorFirstName = $authorFirstName;
    }

    public function getAuthorName(): string
    {
        return $this->authorName;
    }

    public function setAuthorName(string $authorName): void
    {
        $this->authorName = $authorName;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getcover(): string
    {
        return $this->cover;
    }

    public function setCover(string $cover): void
    {
        $this->cover = $cover;
    }

    public function getAvaibility(): bool
    {
        return $this->availability;
    }

    public function setAvaibility(bool $availability): void
    {
        $this->availability = $availability;
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

