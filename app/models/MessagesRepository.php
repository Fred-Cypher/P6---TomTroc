<?php

namespace App\Models;

class MessagesRepository extends AbstractEntityManager
{
    public function addMessage(Message $message): void
    {
        $sql = "INSERT INTO messages (conversation_id, sender_id, content, created_at) VALUES (:conversation_id, :sender_id, :content, :created_at";
        $this->db->query($sql, [
            'conversation_id' => $message->getConversationId(),
            'sender_id' => $message->getSenderId(),
            'content' => $message->getContent(),
            'created_at' => $message->getCreatedAt()->format('Y-m-d H:i:s'),
        ]);
    }

    public function showMessagesByConversation(int $conversationId): array
    {
        $sql = "SELECT m.content, u.pseudo, m.created_at, m.is_read
                FROM messages m
                JOIN users u ON m.sender_id = u.id
                WHERE m.conversation_id = :conversation_id
                ORDER BY m.created_at ASC";
        $query = $this->db->query($sql, ['conversation_id' => $conversationId]);

        return $query->fetchAll();
    }
}