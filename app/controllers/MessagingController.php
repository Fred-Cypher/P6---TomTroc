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

    public function addConversation(){
        $message ='';

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            try{
                $user1Id = $_SESSION['user']['id'];
                $user2Id = Utils::request('user2_id');
                $createdAt = new DateTime();

                $conversation = new Conversation([
                    'user1_id' => $user1Id,
                    'user2_id' => $user2Id,
                    'created_at' => $createdAt
                ]);

                var_dump($user2Id);
                exit;

                $this->conversationsRepository->getOrCreateConversation($conversation);

                Utils::redirect('messages.php');
            } catch (Exception $e) {
                $message = "Erreur : " .$e->getMessage();
            }
        }
    }

    public function showUserConversations(): void
    {
        try{
            $userId = $_SESSION['user']['id'];

            $conversationsRepository = new ConversationsRepository();
            $conversations = $conversationsRepository->getConversationsByUser($userId); 

            if (!$conversations){
                throw new Exception("Les conversations demandées n'existent pas");
            }
        } catch (Exception $e) {
            $message = "Erreur : " . $e->getMessage();
        }

        $title = "Tom Troc - Messagerie";
        ob_start();
        require __DIR__ . '../../views/templates/conversations.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }

    public function sendMessage(){
        $message= '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try{
                $conversationId = Utils::request('conversation_id');
                $senderId = $_SESSION['user']['id'];
                $content = Utils::request('content');
                $createdAt = new DateTime();

                $message = new Message([
                    'conversation_id' => $conversationId,
                    'sender_id' => $senderId,
                    'content' => $content,
                    'created_at' => $createdAt,
                ]);

                $this->messagesRepository->addMessage($message);

                Utils::redirect('messages');
            } catch (Exception $e) {
                $message = "Erreur : " . $e->getMessage();
            }
        }
    }

    public function showMessages(){
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            try {
                $conversationId = Utils::request('conversation_id');
                $messages = $this->messagesRepository->showMessagesByConversation($conversationId);

                if (!$messages) {
                    throw new Exception("La conversation demandée n'existe pas");
                }
            } catch (Exception $e) {
                $message = "Erreur : " . $e->getMessage();
                var_dump($message);
                die;
            }
        }

        $title = "Tom Troc - Messagerie";
        ob_start();
        require __DIR__ . '../../views/templates/messages.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }
}