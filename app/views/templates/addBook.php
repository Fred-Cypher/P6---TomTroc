<h2>Enregistrer un nouveau livre</h2>

<form action="" method="POST">
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
        <label for="availability">Disponibilité <span class="asterisk">*</span></label>
        <input type="checkbox" name="availability" id="availability" required>
    </p>
    <p>
        <button class="submit">Enregistrer le livre</button>
    </p>
</form>