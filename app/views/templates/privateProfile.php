<?php

use App\services\Utils;
?>
<h2 class="title profileTitle">Mon compte</h2>

<section class="profile">
    <form action="index.php?action=updateUser" method="post" enctype="multipart/form-data" class="profileForm">
        <div class="profileDetail">
            <article class="profileDefinition">
                <div class="profileAvatar">
                    <div>
                        <img src="/uploads/avatars/<?= htmlspecialchars($user->getAvatar()) ?>" alt="" class="avatar" id="avatarPreview">
                    </div>
                    <div>
                        <label for="avatar" class="labelUpdate">Modifier</label>
                        <input type="file" name="avatar" id="avatar" class="inputUpdate" onchange="previewImage(event)">
                    </div>
                </div>
                <div class="profileBlockText">
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
                        <input type="text" id="email" name="email" value="<?= htmlspecialchars($user->getEmail()) ?>" class="updateUserInput">
                    </p>
                    <p class="updateLabelInput">
                        <label for="password" class="updateUserLabel">Mot de passe</label>
                        <input type="password" id="password" name="password" placeholder="•••••••••" class="updateUserInput placeholderPwd">
                    </p>
                    <p class="updateLabelInput">
                        <label for="pseudo" class="updateUserLabel">Pseudo</label>
                        <input type="text" id="pseudo" name="pseudo" value="<?= htmlspecialchars($user->getPseudo()) ?>" class="updateUserInput">
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
    <table class="profileTable">
        <thead class="profileThead">
            <tr>
                <th class="tableTitlePicture">
                    PHOTO
                </th>
                <th class="tableTitle">
                    TITRE
                </th>
                <th class="tableAuthor">
                    AUTEUR
                </th>
                <th class="tableDescription">
                    DESCRIPTION
                </th>
                <th class="tableAvailability">
                    DISPONIBILITE
                </th>
                <th class="tableTitleActions">
                    ACTION
                </th>
            </tr>
        </thead>
        <tbody class="booksTable">
            <?php foreach ($books as $index => $book): ?>
                <tr>
                    <td class="tablePicture">
                        <div class="tableContainer">
                            <img src="/uploads/covers/<?= htmlspecialchars($book->getCover()) ?>" alt="" class="smallCover">
                        </div>
                    </td>
                    <td class="tableTitle">
                        <div class="tableContainer">
                            <?= htmlspecialchars($book->getTitle()) ?>
                        </div>
                    </td>
                    <td class="tableAuthor">
                        <div class="tableContainer">
                            <?= htmlspecialchars($book->getAuthor()) ?>
                        </div>
                    </td>
                    <td class="tableDescription">
                        <div class="tableContainer tableComment">
                            <?= htmlspecialchars($book->getComment()) ?>
                        </div>
                    </td>
                    <td class="tableAvailability">
                        <div class="tableContainer">
                            <?php if ($book->getAvailability() == 1): ?>
                                <span class="available">Disponible</span>
                            <?php else: ?>
                                <span class="unavailable">Non dispo.</span>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td class="tableActions">
                        <div class="tableContainer">
                            <a href="index.php?action=updateBook&id=<?= $book->getId() ?>" class="tableEdit">Éditer </a>
                            <a href="index.php?action=deleteBook&id=<?= $book->getId() ?>" class="tableDelete">Supprimer</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<script>
    function previewImage(event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatarPreview').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>