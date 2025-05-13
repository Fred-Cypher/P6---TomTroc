<?php

namespace App\Controllers;

class AdminController
{
    public function index(): void
    {

        $title = "Tom Troc - Administration";
        ob_start();
        require __DIR__ . '../../views/templates/admin.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }

    public function deniedAccess(): void
    {
        $title = "Accès refusé";
        ob_start();
        require __DIR__ . '../../views/templates/deniedAccess.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }
}