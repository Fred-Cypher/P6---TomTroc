<section class="exchangeHeader">
    <h2 class="exchangeTitle">Nos livres à l'échange</h2>
    <form action="index.php" method="get" class="exchangeSearch">
        <input type="hidden" name="action" value="books">
        <input type="search" placeholder="Rechercher un livre" class="inputSearch" name="search">
        <button type="submit" class="loupe-button">
            <img src="/images/loupe.svg" alt="" class="loupe">
        </button>
        
    </form>
    <!--<p class="return">
        <?php if ($_GET['search']) { ?>
            <a href=" index.php?action=books" class="link returnLink">Retour à la page des livres à l'échange</a>
        <?php } else {
            echo "";
        }?>
    </p>
    <a href="index.php?action=home" <?= ($_GET['action'] === 'home') ? 'class="nolink"' : 'class="link"' ?>>Accueil</a>-->

</section>
<section class="exchangeBooks">

    <?php foreach ($books as $book): ?>
        <article class="bookCard">
            <a href="index.php?action=detailBook&id=<?= $book->getId() ?>" class="cardLink">
                <p class="itemImage">
                    <?php if (!$book->getAvailability()): ?>
                        <span class="badgeNonDispo">non dispo.</span>
                    <?php endif ?>
                    <img src="/uploads/covers/<?= htmlspecialchars($book->getCover()) ?>" alt="" class="mediumCover">
                </p>
                <div class="bookInformation">
                    <p class="exchangeBookTitle"><?= htmlspecialchars($book->getTitle()) ?></p>
                    <p class="exchangeBookAuthor"><?= htmlspecialchars($book->getAuthor()) ?></p>
                    <p class="exchangeBookSeller">Vendu par : <?= htmlspecialchars($book->getUserPseudo()) ?></p>
                </div>
            </a>
        </article>
    <?php endforeach; ?>
</section>