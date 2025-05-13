<p class="return">
    <a href="index.php?action=privateProfile" class="returnLink">← retour</a>
</p>

<h2 class="title newBookTitle">Enregistrer un nouveau livre</h2>

<section class="newBook">
    <form action="index.php?action=addBook" method="POST" enctype="multipart/form-data" class="newBookForm">
        <article class="newBookCard">
            <div class="newBookPicture">
                <div>
                    <img src="/uploads/covers/defaultBook.png ?>" alt="" class="updateCover" id="coverPreview">
                </div>
                <div class="newCoverLink">
                    <label for="cover" class="labelUpdate">Ajouter une couverture</label>
                    <input type="file" name="cover" id="cover" class="inputUpdate" onchange="previewImage(event)">
                </div>
            </div>
            <div class="descriptionNew">
                <p class="requiredField"><span class="asterisk">*</span> Champs obligatoires </p>
                <p class="formNewBook">
                    <label for="title" class="newBookLabel">Titre <span class="asterisk">*</span></label>
                    <input type="text" name="title" id="title" class="newInput" required>
                </p>
                <p class="formNewBook">
                    <label for="author" class="newBookLabel">Auteur <span class="asterisk">*</span></label>
                    <input type="text" name="author" id="author" class="newInput" required>
                </p>
                <p class="formNewBook">
                    <label for="comment" class="newBookLabel">Commentaire <span class="asterisk">*</span></label>
                    <textarea name="comment" id="comment" rows="5" cols="80" class="newBookTextarea"></textarea>
                </p>
                <p class="formNewBook">
                    <label for="availability" class="newBookLabel">Disponibilité</label>
                    <select id="availability" name="availability" class="newInput newBookSelect">
                        <option value="1">Disponible</option>
                        <option value="0">Indisponible</option>
                    </select>
                </p>
                <div class="newBookButton">
                    <button class="button">Enregistrer le livre</button>
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
            reader.onload = function (e) {
                document.getElementById('coverPreview').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>