<?php

namespace App\Controllers;

class UserController{
    public function index()
    {
    
    }

    public function login()
    {
        $title = "Tom Troc - Connexion";
        ob_start();
        require __DIR__ . '../../views/templates/login.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/index.php';
    }
}