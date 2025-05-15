<section class="authentication">
    <div class="authenticationText">
        <h2 class="authenticationTitle">Inscription</h2>

        <?php if (!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>

        <form action="index.php?action=register" method="POST" class="authenticationForm">
            <label for="pseudo" class="authenticationLabel">Pseudo</label>
            <input type="text" name="pseudo" class="authenticationInput" id="pseudo" required>
            <label for="email" class="authenticationLabel">Adresse email</label>
            <input type="text" class="authenticationInput" name="email" id="email" required>
            <label for="password" class="authenticationLabel">Mot de passe</label>
            <input type="password" class="authenticationInput" name="password" id="password" required>
            <button class="button">S'inscrire</button>
        </form>

        <p class="authenticationQuestion">Déjà inscrit ? <a href="index.php?action=login">Connectez-vous</a></p>
    </div>
    <div class="authenticationIllustration">
        <img src="/images/mask_group-1.png" class="authenticationPicture"
             alt="Illustration représentant une bibliothèque pleine de livres">
    </div>
</section>