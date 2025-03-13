<?php

namespace App\Controllers;

class MessagingController 
{
    public function index()
    {
        $title = "Tom Troc - Messagerie";
        ob_start();
        require __DIR__ . '../../views/templates/messages.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }
}