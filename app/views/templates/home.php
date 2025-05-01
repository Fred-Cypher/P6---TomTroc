<section class="presentation">
    <div class="textPresentation">
        <p class="presentationTitle">Rejoignez nos lecteurs passionnés</p>
        <p class="presentationContent">Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres. </p>
        <p class="homeButton">
            <a href="index.php?action=books">
                <button class="button">Découvrir</button>
            </a>
        </p>
    </div>
    <div>
        <img src="/images/hamza-nouasria-KXrvPthkmYQ-unsplash1-1.png" alt="" class="picturePresentation">
        <p class="pictureAuthor">Hamza</p>
    </div>
</section>
<section class="lastBooks">
    <div class="lastBooksTitle">Les derniers livres ajoutés</div>
    <div class="lastBooksCards">
        <?php foreach ($books as $book): ?>
            <div class="bookCard">
                <a href="index.php?action=detailBook&id=<?= $book->getId() ?>" class="cardLink">
                    <p class="itemImage">
                        <?php if (!$book->getAvailability()): ?>
                            <span class="badgeDispo">non dispo.</span>
                        <?php endif ?>
                        <img src="/uploads/covers/<?= htmlspecialchars($book->getCover()) ?>" alt="" class="mediumCover">
                    </p>
                    <div class="bookInformation">
                        <p class="exchangeBookTitle"><?= htmlspecialchars($book->getTitle()) ?></p>
                        <p class="exchangeBookAuthor"><?= htmlspecialchars($book->getAuthor()) ?></p>
                        <p class="exchangeBookSeller">Vendu par : <?= htmlspecialchars($book->getUserPseudo()) ?></p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="index.php?action=books">
        <button class="button">Voir tous les livres</button>
    </a>
</section>
<section class="values">
    <div class="operation">
        <div class="operationTitle">Comment ça marche ?</div>
        <span>Échanger des livres avec TomTroc c'est simple et amusant ! Suivez ces étapes pour commencer :</span>
        <div class="operationStickers">
            <div class="sticker">
                <p class="stickerText">
                    Inscrivez-vous gratuitement sur
                    notre plateforme
                </p>
            </div>
            <div class="sticker">
                <p class="stickerText">
                    Ajoutez les livres que vous souhaitez échanger à votre profil.
                </p>
            </div>
            <div class="sticker">
                <p class="stickerText">
                    Parcourez les livres disponibles chez d'autres membres.
                </p>
            </div>
            <div class="sticker">
                <p class="stickerText">
                    Proposez un échange et discutez avec d'autres passionnés de lecture.
                </p>
            </div>
        </div>
        <p class="homeButton">
            <a href="index.php?action=books">
                <button class="lightButton button">Voir tous les livres</button>
            </a>
        </p>

    </div>
    <img src="/images/mask_group.png" alt="" class="pictureValues">
    <div class="textValues">
        <div class="titleValues">Nos valeurs</div>
        <p class="tomValues">
            Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes. <br>

            Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé. <br>

            Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.</p>
        <p class="sign">
            <span>L'équipe Tom Troc</span>
        </p>
    </div>
    <div class="signVector">
        <img src="/images/vector2.svg" alt="">
    </div>
</section>