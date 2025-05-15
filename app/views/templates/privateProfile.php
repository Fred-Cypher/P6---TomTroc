<h2 class="title profileTitle">Mon compte</h2>

<section class="profile">
    <form action="index.php?action=updateUser" method="post" enctype="multipart/form-data" class="profileForm">
        <div class="profileDetail">
            <article class="profileDefinition">
                <div class="profileAvatar">
                    <div>
                        <img src="/uploads/avatars/<?= htmlspecialchars($user->getAvatar()) ?>"
                             alt="Avatar de l'utilisateur" class="avatar" id="avatarPreview">
                    </div>
                    <div>
                        <label for="avatar" class="updateAvatar">Modifier</label>
                        <input type="file" name="avatar" id="avatar" class="inputUpdate" onchange="previewImage(event)">
                    </div>
                </div>
                <div class="profileBlockText">
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
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </article>
            <article class="profileData">
                <p class="profileDataTitle">Vos informations personnelles</p>
                <div class="profileUpdateForm">
                    <input type="hidden" name="id" id="id" value="<?= $user->getId() ?>">
                    <p class="updateLabelInput">
                        <label for="email" class="updateUserLabel">Adresse email</label>
                        <input type="text" id="email" name="email" value="<?= htmlspecialchars($user->getEmail()) ?>"
                               class="updateUserInput">
                    </p>
                    <p class="updateLabelInput">
                        <label for="password" class="updateUserLabel">Mot de passe</label>
                        <input type="password" id="password" name="password" placeholder="•••••••••"
                               class="updateUserInput placeholderPwd">
                    </p>
                    <p class="updateLabelInput">
                        <label for="pseudo" class="updateUserLabel">Pseudo</label>
                        <input type="text" id="pseudo" name="pseudo" value="<?= htmlspecialchars($user->getPseudo()) ?>"
                               class="updateUserInput">
                    </p>
                </div>
                <p class="buttonUserUpdate">
                    <button class="button lightButton">Enregistrer</button>
                </p>
            </article>
        </div>
    </form>
</section>
<section class="profileBooks">
    <div class="profileTable">
        <div class="profileThead">
            <div class="tableTitlePicture">
                PHOTO
            </div>
            <div class="tableTitle">
                TITRE
            </div>
            <div class="tableAuthor">
                AUTEUR
            </div>
            <div class="tableDescription">
                DESCRIPTION
            </div>
            <div class="tableAvailability">
                DISPONIBILITE
            </div>
            <div class="tableTitleActions">
                ACTION
            </div>
        </div>
        <div class="booksTable">
            <?php foreach ($books as $index => $book): ?>
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
                    <div class="tableAvailability">
                        <div class="tableContainer">
                            <?php if ($book->getAvailability() == 1): ?>
                                <span class="available">Disponible</span>
                            <?php else: ?>
                                <span class="unavailable">Non dispo.</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="tableActions">
                        <div class="tableContainer">
                            <a href="index.php?action=updateBook&id=<?= $book->getId() ?>" class="tableEdit">Éditer </a>
                            <a href="index.php?action=deleteBook&id=<?= $book->getId() ?>"
                               class="tableDelete">Supprimer</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<a href="index.php?action=addBook" class="addNewBook">
    <button class="button">Enregistrer un nouveau livre</button>
</a>

<script>
    function previewImage(event) {
        let input = event.target;
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('avatarPreview').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>