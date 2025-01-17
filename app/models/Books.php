<?php

namespace App\Models;

use DateTime;

class Books {
    private int $id;
    private string $title;
    private string $authorFirstName;
    private string $authorLastName;
    private string $description;
    private int $userId;
    private string $cover;
    private bool $availability;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function __construct(array $data = [])
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . str_replace('_', '', ucwords($key, '_'));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
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

    public function getAuthorLastName(): string
    {
        return $this->authorLastName;
    }

    public function setAuthorName(string $authorLastName): void
    {
        $this->authorLastName = $authorLastName;
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

