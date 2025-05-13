<p class="filAriane">Nos livres > <?= htmlspecialchars($book->getTitle()) ?> </p>
<section class="singleBook">
    <article class="detailCover">
        <?php if (htmlspecialchars($book->getCover())): ?>
            <img src="/uploads/covers/<?= htmlspecialchars($book->getCover()) ?>" alt="" class="largeCover">
        <?php else: ?>
            <img src="/uploads/covers/defaultBook.jpg" alt="" class="largeCover">
        <?php endif ?>
    </article>
    <article class="bookDescription">
        <h2 class="detailTitle"><?= htmlspecialchars($book->getTitle()) ?></h2>
        <p class="detailAuthor">par <?= htmlspecialchars($book->getAuthor()) ?></p>
        <hr class="detailLine">
        <div class="detailDescription">DESCRIPTION</div>
        <p class="detailComment">
            <?= nl2br(htmlspecialchars($book->getComment())) ?>
        </p>
        <p>
        <div class="detailOwner">PROPRIÉTAIRE</div>
        <div>
            <a href="index.php?action=publicProfile&id=<?= $book->getUserId() ?>" class="badgeUser link">
                <img src="/uploads/avatars/<?= htmlspecialchars($book->getUserAvatar()) ?>" alt="" class="mediumAvatar">
                <p><?= htmlspecialchars($book->getUserPseudo()) ?></p>
            </a>
        </div>
        <div>
            <?php if ($book->getUserId() != $_SESSION['user']['id']) { ?>
                <a href="index.php?action=messages&user2_id=<?= $book->getUserId() ?>" class="detailSendMessage">
                    <button class="button detailButton">Envoyer un message</button>
                </a>
                <?php
            } ?>
        </div>
    </article>
</section>