<?php

namespace App\Controllers;

class AdminController
{
    public function index(){

        $title = "Tom Troc - Administration";
        ob_start();
        require __DIR__ . '../../views/templates/admin.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }
}