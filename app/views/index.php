<?php

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light headerNav">
            <div class="border border-info col-6 d-flex justify-content-evenly align-items-center">
                <img src="/images/logo.svg" alt="Logo Tom Troc">
                <a href="#" class="link">Accueil</a>
                <a href="#" class="link">Nos livres à l'échange</a>
            </div>
            <div class="border border-info col-6 d-flex justify-content-evenly">
                <span class="line">|</span>
                <a href="#" class="link">
                    <img src="/images/icon_messagerie.svg" alt="Messagerie">
                    Messagerie
                </a>
                <a href="#" class="link">
                    <img src="/images/icon_mon_compte.svg" alt="Mon compte">
                    Mon compte
                </a>
                <a href="#" class="link">
                    Connexion
                </a>
            </div>
        </nav>
    </header>
    <main class="container">
        <?= $content ?>
    </main>
    <footer class="footer d-flex justify-content-end">
        <span class="footerSpan">Politique de confidentialité</span>
        <span class="footerSpan">Mentions légales</span>
        <span class="footerSpan">Tom Troc </span>
        <span class="footerSpan"><img src="/images/Group10-1.svg" alt="Tom Troc"></span>
    </footer>
</body>

</html>