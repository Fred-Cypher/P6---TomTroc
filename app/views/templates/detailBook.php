<section>
    <span>Nos livres > <?= $book->getTitle() ?> </span>

    <img src="" alt="Couverture du livre">

    <h2><?= $book->getTitle() ?></h2>
    <p><?= $book->getAuthor() ?></p>
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