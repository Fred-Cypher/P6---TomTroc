<section>
    <h2>Nos livres à l'échange</h2>
    <form action="">
        <input type="search" placeholder="Rechercher un livre">
    </form>
</section>
<section class="exchangeBooks">
    
    <?php foreach ($books as $book): ?>
        <article class="bookCard">
            <a href="index.php?action=detailBook&id=<?= $book->getId() ?>" class="cardLink">
                <p class="itemImage">
                    <?php if (!$book->getAvailability()): ?>
                        <span class="badgeDispo">non dispo.</span>
                    <?php endif ?>
                    <img src="/uploads/covers/<?= $book->getCover() ?>" alt="" class="mediumCover">
                </p>
                <div class="bookInformation">
                    <p class="exchangeBookTitle"><?= $book->getTitle() ?></p>
                    <p class="exchangeBookAuthor"><?= $book->getAuthor() ?></p>
                    <p class="exchangeBookSeller">Vendu par : <?= $book->getUserPseudo() ?></p>
                </div>
            </a>
        </article>
    <?php endforeach; ?>
</section>