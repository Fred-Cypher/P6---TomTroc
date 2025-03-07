<section style="display:flex">
    <article>
        <p>
            <img src="/uploads/avatars/<?= $user->getAvatar() ?>" alt="" class="avatar" id="avatarPreview">
        </p>
        <p><?= $user->getPseudo() ?></p>
        <p>Membre depuis...</p>
        <p>BIBLIOTHEQUE</p>
        <p>
            <img src="/images/vector.svg" alt="">
            4 livres
        </p>
        <p>
            <a href="#">
                <button>Ecrire un message</button>
            </a>
        </p>
    </article>
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
                            <?= $book->getTitle() ?>
                        </div>
                    </td>
                    <td>
                        <div class="tableContainer">
                            <?= $book->getAuthor() ?>
                        </div>
                    </td>
                    <td>
                        <div class="tableContainer">
                            <?= $book->getComment() ?>
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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>