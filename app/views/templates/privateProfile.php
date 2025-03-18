<?php

use App\services\Utils;
?>
<h2 class="title">Mon compte</h2>

<section style="display:flex">
    <form action="index.php?action=updateUser" method="post" enctype="multipart/form-data" class="profileForm">
        <article>
            <p>
                <img src="/uploads/avatars/<?= htmlspecialchars($user->getAvatar()) ?>" alt="" class="avatar" id="avatarPreview">
            </p>
            <p>
                <label for="avatar" class="labelUpdate">Modifier</label>
                <input type="file" name="avatar" id="avatar" class="inputUpdate" onchange="previewImage(event)">
            </p>
            <p>Membre depuis...</p>
            <p>BIBLIOTHEQUE</p>
            <p>
                <img src="/images/vector.svg" alt="">
                4 livres
            </p>
        </article>
        <article>
            <p>Vos informations personnelles</p>
            <input type="hidden" name="id" id="id" value="<?= $user->getId() ?>">
            <p>
                <label for="email">Adresse email</label>
                <input type="text" id="email" name="email" value="<?= htmlspecialchars($user->getEmail()) ?>">
            </p>
            <p>
                <label for="">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="•••••••••" class="placeholderPwd">
            </p>
            <p>
                <label for="">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo" value="<?= htmlspecialchars($user->getPseudo()) ?>">
            </p>
            <p>
                <button class="submit">Enregistrer</button>
            </p>
        </article>
    </form>
</section>
<section>
    <table class="profileTable">
        <thead>
            <tr>
                <th>
                    <div>PHOTO</div>
                </th>
                <th>
                    <div>TITRE</div>
                </th>
                <th>
                    <div>AUTEUR</div>
                </th>
                <th>
                    <div>DESCRIPTION</div>
                </th>
                <th>
                    <div>DISPONIBILITE</div>
                </th>
                <th>
                    <div>ACTION</div>
                </th>
            </tr>
        </thead>
        <tbody class="booksTable">
            <?php foreach ($books as $book): ?>
                <tr style="background-color: red">
                    <td>
                        <div class="tableContainer">
                            <img src="/uploads/covers/<?= $book->getCover() ?>" alt="" class="smallCover">
                        </div>
                    </td>
                    <td>
                        <div class="tableContainer">
                            <?= Utils::format($book->getTitle()) ?>
                        </div>
                    </td>
                    <td>
                        <div class="tableContainer">
                            <?= Utils::format($book->getAuthor()) ?>
                        </div>
                    </td>
                    <td>
                        <div class="tableContainer">
                            <?= Utils::format($book->getComment()) ?>
                        </div>
                    </td>
                    <td>
                        <div class="tableContainer">
                            <?php if ($book->getAvailability() == 1): ?>
                                <span class="available">Disponible</span>
                            <?php else: ?>
                                <span class="unavailable">Non dispo.</span>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td>
                        <div class="tableContainer">
                            <a href="index.php?action=updateBook&id=<?= $book->getId() ?>">Editer </a>
                            <a href="index.php?action=deleteBook&id=<?= $book->getId() ?>">Supprimer</a>
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