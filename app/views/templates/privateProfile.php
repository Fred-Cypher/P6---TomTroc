<h2>Mon compte</h2>

<section style="display:flex">
    <article>
        <p>
            <img src="/uploads/avatars/adminAvatar.png" alt="" class="avatar">
            <a href="#">Modifier</a>
        </p>
        <p></p>
        <p>Membre depuis...</p>
        <p>BIBLIOTHEQUE</p>
        <p>
            <img src="/images/vector.svg" alt="">
            4 livres
        </p>
    </article>
    <article>
        <p>Vos informations personnelles</p>
        <form action="#">
            <p>
                <label for="email">Adresse email</label>
                <input type="text" id="email" name="email" value="<?= $user->getEmail() ?>">
            </p>
            <p>
                <label for="">Mot de passe</label>
                <input type="password" id="password" name="password" value="<?= $user->getPassword() ?>">
            </p>
            <p>
                <label for="">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo" value="<?= $user->getPseudo() ?>">
            </p>
            <p>
                <button class="submit">Enregistrer</button>
            </p>
        </form>
    </article>
</section>
<section>
    <table>
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
                <tr>
                    <td>
                        <p class="imageContainer">
                            <img src="/uploads/covers/720x863-<?= $book->getCover() ?>" alt=""  class="smallCover">
                        </p>
                        
                    </td>
                    <td>
                        <?= $book->getTitle() ?>
                    </td>
                    <td>
                        <?= $book->getAuthor() ?>
                    </td>
                    <td>
                        <?= $book->getComment() ?>
                    </td>
                    <td>
                        <?php if ($book->getAvailability() == 1): ?>
                        Disponible
                        <?php else: ?>
                        Indisponible
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="">Editer</a>
                        <a href="">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>