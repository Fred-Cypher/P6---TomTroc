<h2>Enregistrer un nouveau livre</h2>

<form action="" method="POST">
    <label for="title">Titre</label>
    <input type="text" name="title" id="title" required>
    <label for="author">Auteur</label>
    <input type="text" name="author" id="author" required>
    <label for="comment">Commentaire</label>
    <input type="textarea" name="comment" id="comment" required>
    <label for="cover">Couverture</label>
    <input type="file" name="cover" id="cover">
    <label for="availability">Disponibilité</label>
    <input type="checkbox" name="availability" id="availability" required>
    <button class="submit">Enregistrer le livre</button>
</form>