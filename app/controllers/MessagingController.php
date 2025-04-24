<?php

namespace App\Controllers;

use App\Models\Conversation;
use App\Models\ConversationsRepository;
use App\Models\Message;
use App\Models\MessagesRepository;
use App\Models\UserRepository;
use App\services\Utils;
use DateTime;

class MessagingController 
{
    private $conversationsRepository;
    private $messagesRepository;
    private $userRepository;

    public function __construct(){
        $this->conversationsRepository = new ConversationsRepository;
        $this->messagesRepository = new MessagesRepository;
        $this->userRepository = new UserRepository;
    }

    public function getMessages(?int $otherUserId = null)
    {
        $currentUserId = $_SESSION['user']['id'];
        $unreadCount = $this->messagesRepository->countUnreadMessages($_SESSION['user']['id']);

        if(!isset($_REQUEST['user2_id'])) {
            $conversations = $this->conversationsRepository->getUserConversations($currentUserId);

            foreach ($conversations as $conversation) {
                $lastMessage = $this->messagesRepository->getLastMessageByConversationId($conversation->getId());
                $otherUserId = ($conversation->getUser1Id() == $currentUserId) ? $conversation->getUser2Id() : $conversation->getUser1Id();
                $otherUser = $this->userRepository->getUserById($otherUserId);
                $conversation->lastMessage = $lastMessage;
                $conversation->otherUser = $otherUser;
            }

            $title = "Tom Troc - Messagerie";
            ob_start();
            require __DIR__ . '../../views/templates/messages.php';
            $content = ob_get_clean();
            require __DIR__ . '../../views/layout.php';

            return;
        }

        $otherUserId = $_REQUEST['user2_id'];
        $conversations = $this->conversationsRepository->getUserConversations($currentUserId);

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

        $messages = $this->messagesRepository->getMessagesByConversationId($conversation->getId());
        $this->messagesRepository->markMessagesAsRead($conversation->getId(), $currentUserId);

        foreach ($conversations as $conversation) {
            $lastMessage = $this->messagesRepository->getLastMessageByConversationId($conversation->getId());
            $otherUserId = ($conversation->getUser1Id() == $currentUserId) ? $conversation->getUser2Id() : $conversation->getUser1Id();
            $otherUser = $this->userRepository->getUserById($otherUserId);
            $conversation->lastMessage = $lastMessage;
            $conversation->otherUser = $otherUser;
        }

        $title = "Tom Troc - Messagerie";
        ob_start();
        require __DIR__ . '../../views/templates/messages.php';
        $content = ob_get_clean();
        $unreadCount = $unreadCount ?? 0;
        require __DIR__ . '../../views/layout.php';
    }

    public function sendMessage()
    {
        $currentUserId = $_SESSION['user']['id'];
        $otherUserId = (int) $_POST['otherUserId'];
        $content = trim($_POST['content']); // A SECURISER ! 

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
        $message->setConversationId($conversation->getId());
        $message->setSenderId($currentUserId);
        $message->setContent($content);
        $message->setIsRead(false);
        $message->setCreatedAt(new DateTime());

        $this->messagesRepository->sendMessage($message);

        Utils::redirect('messages');
    }
}