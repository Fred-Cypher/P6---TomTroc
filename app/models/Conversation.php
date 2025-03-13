<?php

namespace App\Models;

use DateTime;

class Conversation {
    private int $id;
    private int $user1Id;
    private int $user2Id;
    private DateTime $createdAt;
    private string $userIds;

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

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUser1Id(): int
    {
        return $this->user1Id;
    }

    public function setUser1Id(int $user1Id): void
    {
        $this->user1Id = $user1Id;
    }

    public function getUser2Id(): int
    {
        return $this->user2Id;
    }

    public function setUser2Id(int $user2Id): void
    {
        $this->user2Id = $user2Id;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUserIds(): string
    {
        return $this->userIds;
    }

    public function setUserids(string $userIds): void
    {
        $this->userIds = $userIds;
    }
}