<?php

use App\services\Utils;

?>
<section>
    <article>
        <p>
            <img src="/uploads/avatars/<?= htmlspecialchars($user->getAvatar()) ?>" alt="" class="avatar" id="avatarPreview">
        </p>
        <p><?= Utils::format($user->getPseudo()) ?></p>
        <p>Membre depuis...</p>
        <p>BIBLIOTHEQUE</p>
        <p>
            <img src="/images/vector.svg" alt="">
            4 livres
        </p>
        <p>
            <?php if ($userId != $_SESSION['user']['id']) { ?>
                <a href="index.php?action=messages&user2_id=<?= $userId ?>">
                    <button>Ecrire un message</button>
                </a>
            <?php
            } ?>
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
                            <img src="/uploads/covers/<?= htmlspecialchars($book->getCover()) ?>" alt="" class="smallCover">
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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>