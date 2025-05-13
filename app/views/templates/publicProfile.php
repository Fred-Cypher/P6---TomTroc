<section class="publicProfile">
    <article class="publicProfileDetail">
        <div class="profileAvatar">
            <img src="/uploads/avatars/<?= htmlspecialchars($user->getAvatar()) ?>" alt="" class="avatar"
                 id="avatarPreview">
        </div>
        <p class="profilePseudo"><?= htmlspecialchars($user->getPseudo()) ?></p>
        <p class="memberSince">Membre depuis <?= $registeredSince ?></p>

        <div>
            <p class="bibliotheque">BIBLIOTHEQUE</p>
            <p class="booksNumber">
                <img src="/images/vector.svg" alt="">
                <?php if ($count < 2) {
                    echo $count ?> livre <?php
                } else {
                    echo $count ?> livres <?php
                } ?>
            </p>
        </div>

        <p>
            <?php if ($userId != $_SESSION['user']['id']) { ?>
                <a href="index.php?action=messages&user2_id=<?= $userId ?>">
                    <button class="button lightButton">Ecrire un message</button>
                </a>
                <?php
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
                                <img src="/uploads/covers/<?= htmlspecialchars($book->getCover()) ?>" alt=""
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
                                <?= htmlspecialchars($book->getComment()) ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </article>
</section>