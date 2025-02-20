<h2>Nos livres à l'échange</h2>


<section class="exchangeBooks">
    <?php foreach ($books as $book): ?>
        <article class="bookCard">
            <a href="index.php?action=showBook&id=<?= $book->getId() ?>" class="cardLink">
                <?php if ($book->getCover()): ?>
                    <img src="/uploads/covers/<?= $book->getCover() ?>" alt="" class="mediumCover">
                <?php else: ?>
                    <img src="/uploads/covers/defaultBook.jpg" alt="" class="mediumCover">
                <?php endif ?>
                <p class="exchangeBookTitle"><?= $book->getTitle() ?></p>
                <p class="exchangeBookAuthor"><?= $book->getAuthor() ?></p>
                <p class="exchangeBookSeller">Vendu par : <?= $book->getUserId() ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</section>