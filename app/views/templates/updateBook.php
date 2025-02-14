<h2>Modifier les informations</h2>

<form action="/addBook" method="POST" enctype="multipart/form-data">
    <p>
        <label for="title">Titre</label>
        <input type="text" name="title" id="title" value="<?= $book->getTitle() ?>">
    </p>
    <p>
        <label for="author">Auteur</label>
        <input type="text" name="author" id="author" value="<?= $book->getAuthor() ?>">
    </p>
    <p>
        <label for=" comment" class="form-label">Commentaire</label>
        <textarea name="comment" id="comment" rows="5" cols="80">value="<?= $book->getComment() ?></textarea>
    </p>
    <p>
        <label for="cover">Photo</label>
        <p><?= $book->getCover() ?></p>
        <input type="file" name="cover" id="cover">
    </p>
    <p>
        <label for="availability">Disponibilité</label>
        <select>
            <option value="1">Disponible</option>
            <option value="0">Indisponible</option>
        </select>
    </p>
    <p>
        <button class="submit">Valider</button>
    </p>
</form>