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
            'is_read' => (int)$message->getIsRead(),
            'created_at' => $message->getCreatedAt()->format('Y-m-d H:i:s'),
        ]);
    }

    public function getMessagesByConversationId(int $conversationId): array
    {
        $sql = "SELECT * FROM messages WHERE conversation_id = :conversation_id ORDER BY created_at ASC";
        $result = $this->db->query($sql, ['conversation_id' => $conversationId]);
        $messages = [];

        while ($messageData = $result->fetch()) {
            if (isset($messageData['created_at'])) {
                $messageData['created_at'] = new DateTime($messageData['created_at']);
            }
            $messages[] = new Message($messageData);
        }
        return $messages;
    }

    public function getLastMessageByConversationId(int $conversationId): ?Message
    {
        $sql = "SELECT * FROM messages WHERE conversation_id = :conversation_id ORDER BY created_at DESC LIMIT 1";
        $result = $this->db->query($sql, ['conversation_id' => $conversationId]);

        $messageData = $result->fetch();
        if ($messageData) {
            if (isset($messageData['created_at'])) {
                $messageData['created_at'] = new DateTime($messageData['created_at']);
            }
            return new Message($messageData);
        }
        return null;
    }

    public function countUnreadMessages(int $userId): int
    {
        $sql = "SELECT COUNT(*) as unread_count FROM messages 
            INNER JOIN conversations ON messages.conversation_id = conversations.id 
            WHERE messages.is_read = 0 
            AND messages.sender_id != :userId 
            AND (conversations.user1_id = :userId OR conversations.user2_id = :userId)";

        $result = $this->db->query($sql, ['userId' => $userId]);
        $data = $result->fetch();

        return $data ? (int)$data['unread_count'] : 0;
    }

    public function markMessagesAsRead(int $conversationId, int $userId): void
    {
        $sql = "UPDATE messages 
            SET is_read = 1 
            WHERE conversation_id = :conversationId 
            AND sender_id != :userId 
            AND is_read = 0";

        $this->db->query($sql, [
            'conversationId' => $conversationId,
            'userId' => $userId
        ]);
    }
}
