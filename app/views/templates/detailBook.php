<?php

use App\services\Utils;

?>
<span>Nos livres > <?= Utils::format($book->getTitle()) ?> </span>
<section class="singleBook">
    <article>
        <?php if (htmlspecialchars($book->getCover())): ?>
            <img src="/uploads/covers/<?= htmlspecialchars($book->getCover()) ?>" alt="" class="largeCover">
        <?php else: ?>
            <img src="/uploads/covers/defaultBook.jpg" alt="" class="largeCover">
        <?php endif ?>
    </article>
    <article class="bookDescription">
        <h2><?= Utils::format($book->getTitle()) ?></h2>
        <p><?= Utils::format($book->getAuthor()) ?></p>
        <div>DESCRIPTION</div>
        <p>
            <?= Utils::format($book->getComment()) ?>
        </p>
        <p>
        <div>PROPRIÉTAIRE</div>
        <div class="badgeUser">
            <a href="index.php?action=publicProfile&id=<?= $book->getUserId() ?>">
                <img src="/uploads/avatars/<?= htmlspecialchars($book->getUserAvatar()) ?>" alt="" class="mediumAvatar">
                <span><?= Utils::format($book->getUserPseudo()) ?></span>
            </a>
        </div>
        </p>
        <p>
            <a href="index.php?action=messages&user2_id=<?= $book->getUserId() ?>">
                <button>Envoyer un message</button>
            </a>
        </p>
    </article>
</section>