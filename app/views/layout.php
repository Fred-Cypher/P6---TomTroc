<?php

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="icon" type="image/vnd.icon" href="/images/Group10.svg">
</head>

<body>
    <header class="header">
        <nav class="headerNav">
            <div class="headerPublic">
                <img src="/images/logo.svg" alt="Logo Tom Troc" class="logo">
                <a href="index.php?action=home" <?= ($_GET['action'] === 'home') ? 'class="nolink"' : 'class="link"' ?>>Accueil</a>
                <a href="index.php?action=books" <?= ($_GET['action'] === 'books') ? 'class="nolink"' : 'class="link"' ?>>Nos livres à l'échange</a>
            </div>
            <div class="headerPrivate">
                <span class="line">|</span>
                <?php
                if (isset($_SESSION['user'])) { ?>
                    <a href="index.php?action=messages" <?= ($_GET['action'] === 'messages') ? 'class="nolink"' : 'class="link"' ?>>
                        <p class="messagingLink">
                            <img src="/images/icon_messagerie.svg" alt="Messagerie">
                            Messagerie
                            <?php if (UNREAD_COUNT > 0): ?>
                                <div class="badgeCount">
                                    <?= UNREAD_COUNT ?>
                                </div>
                            <?php endif; ?>
                        </p>
                        
                    </a>
                <?php } else { ?>
                    <p class="messagingLink">
                        <a href="index.php?action=login" class="link">
                            <img src="/images/icon_mon_compte.svg" alt="Mon compte">
                            Messagerie
                        </a>
                    </p>
                <?php } ?>
                <?php
                if (isset($_SESSION['user'])) { ?>
                    <a href="index.php?action=privateProfile" <?= ($_GET['action'] === 'privateProfile') ? 'class="nolink"' : 'class="link"' ?>>
                        <img src="/images/icon_mon_compte.svg" alt="Mon compte">
                        Mon compte
                    </a>
                <?php } else { ?>
                    <a href="index.php?action=login" class="link">
                        <img src="/images/icon_mon_compte.svg" alt="Mon compte">
                        Mon compte
                    </a>
                <?php } ?>
                <?php
                if (isset($_SESSION['user'])) { ?>
                    <a href="index.php?action=logout" class="link">
                        Déconnexion
                    </a>
                <?php } else { ?>
                    <a href="index.php?action=login" <?= ($_GET['action'] === 'login') ? 'class="nolink"' : 'class="link"' ?>>
                        Connexion
                    </a>
                <?php } ?>
            </div>
        </nav>
    </header>
    <main class="main">
        <?= $content ?>
    </main>
    <footer>
        <div class="footer">
            <span><?php if (isset($_SESSION['user']['role']) && ($_SESSION['user']['role']) === 'ROLE_ADMIN') { ?>
                    <a href="index.php?action=admin" class="link footerSpan">
                        Panneau d'administration
                    </a>
                <?php } ?></span>
            <span class="footerSpan">Politique de confidentialité</span>
            <span class="footerSpan">Mentions légales</span>
            <span class="footerSpan">Tom Troc &#169; </span>
            <span class="footerSpan"><img src="/images/Group10-1.svg" alt="Tom Troc"></span>
        </div>
    </footer>
</body>

</html>