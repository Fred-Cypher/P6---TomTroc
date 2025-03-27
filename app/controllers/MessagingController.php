<?php

namespace App\Controllers;

use App\Models\Conversation;
use App\Models\ConversationsRepository;
use App\Models\Message;
use App\Models\MessagesRepository;
use App\services\Utils;
use DateTime;
use Exception;

class MessagingController 
{
    private $conversationsRepository;
    private $messagesRepository;

    public function __construct(){
        $this->conversationsRepository = new ConversationsRepository;
        $this->messagesRepository = new MessagesRepository;
    }

    public function index()
    {
        $title = "Tom Troc - Messagerie";
        ob_start();
        require __DIR__ . '../../views/templates/messages.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }

    public function getMessages(?int $otherUserId = null)
    {
        $currentUserId = $_SESSION['user']['id'];

        if(!$otherUserId) {
            $conversations = $this->conversationsRepository->getUserConversations($currentUserId);

            $title = "Tom Troc - Messagerie";
            ob_start();
            require __DIR__ . '../../views/templates/messages.php';
            $content = ob_get_clean();
            require __DIR__ . '../../views/layout.php';

            return;
        }

        $userHash = $this->conversationsRepository->generateUsersHash($currentUserId, $otherUserId);
        $conversation = $this->conversationsRepository->findByHash($userHash);

        if(!$conversation) {
            $conversation = new Conversation();
            $conversation->setUser1Id($currentUserId);
            $conversation->setUser2Id($otherUserId);
            $conversation->setUserHash($userHash);
            $conversation->setCreatedAt(new DateTime());

            $this->conversationsRepository->createConversation($conversation);
            $conversation = $this->conversationsRepository->findByHash($userHash);
        }

        $messages = $this->messagesRepository->getMessagesByConversationId($conversation['id']);

        foreach($messages as $message){
            if ($message['sender_id'] !== $currentUserId){
                $this->messagesRepository->markAsRead($message['id']);
            }
        }

        $title = "Tom Troc - Messagerie";
        ob_start();
        require __DIR__ . '../../views/templates/messages.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }

    public function sendMessage($otherUserId, $content)
    {
        $currentUserId = $_SESSION['user']['id'];
        
        $userHash = $this->conversationsRepository->generateUsersHash($currentUserId, $otherUserId);
        $conversation = $this->conversationsRepository->findByHash($userHash);

        if (!$conversation) {
            $conversation = new Conversation();
            $conversation->setUser1Id($currentUserId);
            $conversation->setUser2Id($otherUserId);
            $conversation->setUserHash($userHash);
            $conversation->setCreatedAt(new DateTime());

            $this->conversationsRepository->createConversation($conversation);
            $conversation = $this->conversationsRepository->findByHash($userHash);
        }

        $message = new Message();
        $message->setConversationId($conversation['id']);
        $message->setSenderId($currentUserId);
        $message->setContent($content);
        $message->setIsRead(false);
        $message->setCreatedAt(new DateTime());

        $this->messagesRepository->sendMessage($message);

        Utils::redirect('messages');
    }
}