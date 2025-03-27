<?php

namespace App\Models;

use DateTime;

class Conversation extends AbstractEntity
{
    private int $user1Id;
    private int $user2Id;
    private DateTime $createdAt;
    private string $userHash;

    public function __construct(array $data = [])
    {
        $this->hydrate($data);
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

    public function getUserHash(): string
    {
        return $this->userHash;
    }

    public function setUserHash(string $userHash): void
    {
        $this->userHash = $userHash;
    }
}