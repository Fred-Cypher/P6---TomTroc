<h2>Enregistrer un nouveau livre</h2>

<form action="index.php?action=addBook" method="POST" enctype="multipart/form-data">
    <p>
        <label for="title">Titre <span class="asterisk">*</span></label>
        <input type="text" name="title" id="title" required>
    </p>
    <p>
        <label for="author">Auteur <span class="asterisk">*</span></label>
        <input type="text" name="author" id="author" required>
    </p>
    <p>
        <label for="comment" class="form-label">Commentaire <span class="asterisk">*</span></label>
        <textarea name="comment" id="comment" rows="5" cols="80"></textarea>
    </p>
    <p>
        <label for="cover">Couverture</label>
        <input type="file" name="cover" id="cover">
    </p>
    <p>
        <label for="availability">Disponibilité</label>
        <select id="availability" name="availability">
            <option value="1">Disponible</option>
            <option value="0">Indisponible</option>
        </select>
    </p>
    <p>
        <button class="submit" class="button">Enregistrer le livre</button>
    </p>
</form>