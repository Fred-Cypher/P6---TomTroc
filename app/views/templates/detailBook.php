<span>Nos livres > <?= $book->getTitle() ?> </span>
<section class="singleBook">
    <article>
        <?php if ($book->getCover()): ?>
            <img src="/uploads/covers/<?= $book->getCover() ?>" alt="" class="largeCover">
        <?php else: ?>
            <img src="/uploads/covers/defaultBook.jpg" alt="" class="largeCover">
        <?php endif ?>
    </article>
    <article class="bookDescription">
        <h2><?= $book->getTitle() ?></h2>
        <p><?= $book->getAuthor() ?></p>
        <div>DESCRIPTION</div>
        <p>
            <?= $book->getComment() ?>
        </p>
        <p>
            <div>PROPRIÉTAIRE</div>
            <div class="badgeUser">
                <img src="/uploads/avatars/<?= $book->getUserAvatar() ?>" alt="" class="mediumAvatar">
                <span><?= $book->getUserPseudo() ?></span>
            </div>
        </p>
        <p>
            <button>Envoyer un message</button>
        </p>
    </article>
    
</section>