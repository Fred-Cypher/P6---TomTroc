<h2>Modifier les informations</h2>

<form action="index.php?action=updateBook" method="POST" enctype="multipart/form-data">
    <section class="updateBook">
        <article>
            <span>
                Photo
            </span>
            <p>
                <img src="/uploads/covers/<?= $book->getCover() ?>" alt="" class="updateCover">
            </p>
            <label for="cover" class="labelUpdate">Modifier la photo</label>
            <input type="file" name="cover" id="cover" class="inputUpdate">
            </p>
        </article>
        <article class="descriptionUpdate">
            <p class="formUpdateBook">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" value="<?= $book->getTitle() ?>">
            </p>
            <p class="formUpdateBook">
                <label for="author">Auteur</label>
                <input type="text" name="author" id="author" value="<?= $book->getAuthor() ?>">
            </p>
            <p class="formUpdateBook">
                <label for=" comment" class="form-label">Commentaire</label>
                <textarea name="comment" id="comment" rows="5" cols="80"><?= $book->getComment() ?></textarea>
            </p>
            <p class="formUpdateBook">
                <label for="availability">Disponibilité</label>
                <select>
                    <option value="1">Disponible</option>
                    <option value="0">Indisponible</option>
                </select>
            </p>
            <p>
                <button class="submit">Valider</button>
            </p>
        </article>
    </section>
</form>