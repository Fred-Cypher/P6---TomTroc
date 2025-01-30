<?php

namespace App\Controllers;

class MainController 
{
    public function index() {
        $title = "Tom Troc - Accueil";
        ob_start();
        require __DIR__ . '../../views/templates/home.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }

    public function error(){
        $title = "Erreur";
        ob_start();
        require __DIR__ . '../../views/templates/error.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }
}