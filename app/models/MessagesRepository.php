<?php

namespace App\Models;

use DateTime;

class MessagesRepository extends AbstractEntityManager
{
    public function sendMessage(Message $message): void
    {
        $sql = "INSERT INTO messages (conversation_id, sender_id, content, is_read, created_at) VALUES (:conversation_id, :sender_id, :content, :is_read, :created_at)";
        $this->db->query($sql, [
            'conversation_id' => $message->getConversationId(),
            'sender_id' => $message->getSenderId(),
            'content' => $message->getContent(),
            'is_read' => (int) $message->getIsRead(),
            'created_at' => $message->getCreatedAt()->format('Y-m-d H:i:s'),
        ]);
    }

    public function getMessagesByConversationId(int $conversationId): array
    {
        $sql = "SELECT * FROM messages WHERE conversation_id = :conversation_id ORDER BY created_at ASC";
        $result = $this->db->query($sql, ['conversation_id' => $conversationId]);
        $messages = [];

        while($messageData = $result->fetch()){
            if (isset($messageData['created_at']))
            {
                $messageData['created_at'] = new DateTime($messageData['created_at']);
            }
            $messages[] = new Message($messageData);
        }

        return $messages;
    }

    public function getLastMessageByConversationId(int $conversationId): array
    {
        $sql = "SELECT * FROM messages WHERE conversation_id = :conversation_id ORDER BY created_at ASC LIMIT 1";
        $result = $this->db->query($sql, ['conversation_id' => $conversationId]);
        $messages = [];

        while($messageData = $result->fetch()){
            if (isset($messageData['created_at'])) {
                $messageData['created_at'] = new DateTime($messageData['created_at']);
            }
            $messages[] = new Message($messageData);
        }

        return $messages;
    }

    public function markAsRead($messageId): void
    {
        $sql = "UPDATE messages SET is_read = 1 WHERE id = :id";
        $this->db->query($sql, ['id' => $messageId]);
    }
}