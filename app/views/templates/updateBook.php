<h2>Modifier les informations</h2>

<form action="index.php?action=updateBook" method="POST" enctype="multipart/form-data">
    <section class="updateBook">
        <article>
            <span>
                Photo
            </span>
            <p>
                <img src="/uploads/covers/<?= htmlspecialchars($book->getCover()) ?>" alt="" class="updateCover" id="coverPreview">
            </p>
            <p>
                <label for="cover" class="labelUpdate">Modifier la photo</label>
                <input type="file" name="cover" id="cover" class="inputUpdate" onchange="previewImage(event)">
            </p>
        </article>
        <article class="descriptionUpdate">
            <input type="hidden" name="id" id="id" value="<?= $book->getId() ?>">
            <p class="formUpdateBook">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" value="<?= htmlspecialchars($book->getTitle()) ?>">
            </p>
            <p class="formUpdateBook">
                <label for="author">Auteur</label>
                <input type="text" name="author" id="author" value="<?= htmlspecialchars($book->getAuthor()) ?>">
            </p>
            <p class="formUpdateBook">
                <label for=" comment" class="form-label">Commentaire</label>
                <textarea name="comment" id="comment" rows="5" cols="80"><?= htmlspecialchars($book->getComment()) ?></textarea>
            </p>
            <p class="formUpdateBook">
                <label for="availability">Disponibilité</label>
                <select name="availability">
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

<script>
    function previewImage(event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('coverPreview').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>