<?php

namespace App\Models;

use DateTime;
use PDO;

class ConversationsRepository extends AbstractEntityManager
{
    public function generateUsersHash(int $user1_id, int $user2_id): string
    {
        return hash('sha256', min($user1_id, $user2_id) . '-' . max($user1_id, $user2_id));
    }

    public function getAllConversations(): array
    {
        $sql = "SELECT * FROM conversations";
        $result = $this->db->query($sql);
        $conversations = [];

        while ($conversation = $result->fetch(PDO::FETCH_ASSOC)) {
            if ($conversation) {
                $conversation['user1_id'] = $conversation['user1_id'];
                $conversation['user2_id'] = $conversation['user2_id'];
                $conversation['created_at'] = new DateTime($conversation['created_at']);
                $conversation['user_hash'] = $conversation['user_hash'];
            }
            $conversations[] = new Conversation($conversation);
        }
        return $conversations;
    }

    public function findByHash(string $userHash): ?Conversation
    {
        $sql = "SELECT * FROM conversations WHERE user_hash = :user_hash";
        $stmt = $this->db->query($sql, ['user_hash' => $userHash]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return null;
        }

        $conversation = new Conversation();
        $conversation->setId($result['id']);
        $conversation->setUser1Id($result['user1_id']);
        $conversation->setUser2Id($result['user2_id']);
        $conversation->setUserHash($result['user_hash']);
        $conversation->setCreatedAt(new DateTime($result['created_at']));

        return $conversation;
    }

    public function createConversation(Conversation $conversation): void
    {
        try {
            $sql = "INSERT INTO conversations (user1_id, user2_id, user_hash, created_at) VALUES (:user1_id, :user2_id, :user_hash, :created_at)";

            $this->db->query($sql, [
                'user1_id' => $conversation->getUser1Id(),
                'user2_id' => $conversation->getUser2Id(),
                'user_hash' => $conversation->getUserHash(),
                'created_at' => $conversation->getCreatedAt()->format('Y-m-d H:i:s')
            ]);
            echo "Conversation créée avec succès";
        } catch (\Exception $e) {
            die("Erreur SQL : " . $e->getMessage());
        }
    }

    public function getUserConversations(int $userId): array
    {
        $sql = "SELECT * FROM conversations WHERE user1_id = :user_id OR user2_id = :user_id ORDER BY created_at DESC";
        $result = $this->db->query($sql, ['user_id' => $userId]);
        $conversations = [];

        while ($conversationData = $result->fetch()) {
            if (isset($conversationData['created_at'])) {
                $conversationData['created_at'] = new DateTime($conversationData['created_at']);
            }
            $conversations[] = new Conversation($conversationData);
        }
        return $conversations;
    }
}