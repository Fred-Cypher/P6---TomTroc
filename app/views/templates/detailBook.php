<section>
    <span>Nos livres > <?= $book->getTitle() ?> </span>

    <article>
        <?php if ($book->getCover()): ?>
            <img src="/uploads/covers/<?= $book->getCover() ?>" alt="" class="mediumCover">
        <?php else: ?>
            <img src="/uploads/covers/defaultBook.jpg" alt="" class="mediumCover">
        <?php endif ?>

        <h2><?= $book->getTitle() ?></h2>
        <p><?= $book->getAuthor() ?></p>
    </article>
    <article>
        <div>DESCRIPTION</div>
        <p>
            <?= $book->getComment() ?>
        </p>
    </article>
    <p>
        <?= $book->getUser() ?>
    </p>
    <p>
        <button>Envoyer un message</button>
    </p>
</section>