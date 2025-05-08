<p class="return">
    <a href="index.php?action=privateProfile" class="returnLink">← retour</a>
</p>

<h2 class="title updateBookTitle">Modifier les informations</h2>

<section class="updateBook">
    <form action="index.php?action=updateBook" method="POST" enctype="multipart/form-data" class="updateBookForm">
        <article class="updateBookCard">
            <div class="updateBookPicture">
                <span class="updateBookLabel">
                    Photo
                </span>
                <div>
                    <img src="/uploads/covers/<?= htmlspecialchars($book->getCover()) ?>" alt="" class="updateCover" id="coverPreview">
                </div>
                <div class="updateCoverLink">
                    <label for="cover" class="labelUpdate ">Modifier la photo</label>
                    <input type="file" name="cover" id="cover" class="inputUpdate" onchange="previewImage(event)">
                </div>
            </div>
            <div class="descriptionUpdate">
                <input type="hidden" name="id" id="id" value="<?= $book->getId() ?>">
                <p class="formUpdateBook">
                    <label for="title" class="updateBookLabel">Titre</label>
                    <input type="text" name="title" id="title" class="updateInput" value="<?= htmlspecialchars($book->getTitle()) ?>">
                </p>
                <p class="formUpdateBook">
                    <label for="author" class="updateBookLabel">Auteur</label>
                    <input type="text" name="author" id="author" class="updateInput" value="<?= htmlspecialchars($book->getAuthor()) ?>">
                </p>
                <p class="formUpdateBook">
                    <label for="comment" class="form-label updateBookLabel">Commentaire</label>
                    <textarea name="comment" id="comment" class="updateBookTextarea" rows="17" cols="80"><?= htmlspecialchars($book->getComment()) ?></textarea>
                </p>
                <p class="formUpdateBook">
                    <label for="availability" class="updateBookLabel">Disponibilité</label>
                    <select name="availability" class="updateInput updateBookSelect">
                        <option value="1">Disponible</option>
                        <option value="0">Indisponible</option>
                    </select>
                </p>
                <div class="updateBookButton">
                    <button class="button">Valider</button>
                </div>
            </div>
        </article>
    </form>
</section>


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