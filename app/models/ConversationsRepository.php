<?php

namespace App\Models;

use DateTime;

class ConversationsRepository extends AbstractEntityManager
{
    public function generateUsersHash(int $user1_id, int $user2_id): string
    {
        return hash('sha256', min($user1_id, $user2_id) . '-' . max($user1_id, $user2_id));
    }

    public function getOrCreateConversation (Conversation $conversation): int 
    {
        $user_hash = $this->generateUsersHash($conversation->getUser1Id(), $conversation->getUser2Id());

        $sql = "SELECT id FROM conversations WHERE user_hash = :user_hash";
        $query = $this->db->query($sql, [
            'user_hash' => $user_hash
        ]);
        $existingConversation = $query->fetch();

        if ($existingConversation) {
            return $existingConversation['id'];
        }

        $sql = "INSERT INTO conversations (user1_id, user2_id, user_hash, created_at) VALUES (:user1_id, :user2_id, :user_hash, :created_at)";
        $this->db->query($sql, [
            'user1_id' => $conversation->getUser1Id(), 
            'user2_id' => $conversation->getUser2Id(), 
            'user_hash' => $user_hash,
            'created_at' => $conversation->getCreatedAt()->format('Y-m-d H:i:s'),
            ]);
        return (int) $this->db->lastInsertId();
    }

    public function getConversationsByUser(int $userId): array
    {
        $sql = "SELECT c.id, u.pseudo
                FROM conversations c
                JOIN users u ON (c.user1_id = u.id OR c.user2_id = u.id) AND u.id != :userId
                WHERE c.user1_id = :user1Id OR c.user2_id = :userId";
        $query = $this->db->query($sql, ['userId' => $userId]);
        return $query->fetchAll();
    }
}