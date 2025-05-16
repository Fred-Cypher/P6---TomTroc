<section class="publicProfile">
    <article class="publicProfileDetail">
        <div class="profileAvatar">
            <img src="/uploads/avatars/<?= htmlspecialchars($user->getAvatar()) ?>" alt="Avatar de l'utilisateur"
                 class="avatar">
        </div>
        <p class="profilePseudo"><?= htmlspecialchars($user->getPseudo()) ?></p>
        <p class="memberSince">Membre depuis <?= $registeredSince ?></p>

        <div class="biblioBlock">
            <p class="bibliotheque">BIBLIOTHEQUE</p>
            <p class="booksNumber">
                <img src="/images/vector.svg" alt="Image vectorielle représentant deux livres sur champ">
                <?php if ($count < 2) {
                    echo $count ?> livre <?php
                } else {
                    echo $count ?> livres <?php
                } ?>
            </p>
        </div>

        <p>
            <?php if (isset($_SESSION['user']['id'])) {
                if ($userId != $_SESSION['user']['id']) { ?>
                    <div class="button lightButton">
                        <a href="index.php?action=messages&user2_id=<?= $userId ?>">
                            Ecrire un message
                        </a>
                    </div>
                <?php }
            } ?>
        </p>
    </article>
    <article class="publicProfileBooks">
        <div class="publicProfileTable">
            <div class="profileThead">
                <div class="tableTitlePicture">PHOTO</div>
                <div class="tableTitle">TITRE</div>
                <div class="tableAuthor">AUTEUR</div>
                <div class="tableDescription">DESCRIPTION</div>
            </div>
            <div class="booksTable">
                <?php foreach ($books as $book): ?>
                    <div class="booksRow">
                        <div class="tablePicture">
                            <div class="tableContainer">
                                <img src="/uploads/covers/<?= htmlspecialchars($book->getCover()) ?>"
                                     alt="Illustration pour le livre : <?= htmlspecialchars($book->getTitle()) ?>"
                                     class="smallCover">
                            </div>
                        </div>
                        <div class="tableTitle">
                            <div class="tableContainer">
                                <?= htmlspecialchars($book->getTitle()) ?>
                            </div>
                        </div>
                        <div class="tableAuthor">
                            <div class="tableContainer">
                                <?= htmlspecialchars($book->getAuthor()) ?>
                            </div>
                        </div>
                        <div class="tableDescription">
                            <div class="tableContainer tableComment">
                                <?= nl2br(htmlspecialchars($book->getComment())) ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </article>
</section>