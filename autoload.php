<?php

spl_autoload_register(function ($class) {
    // Convertit l'espace de noms en chemin de fichier
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = __DIR__ . '/' . $class . '.php';

    if (file_exists($file)) {
        require_once $file;
    } else {
        die("Impossible de charger la classe : $class");
    }
});

