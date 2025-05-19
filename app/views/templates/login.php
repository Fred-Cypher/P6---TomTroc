<section class="authentication">
    <div class="authenticationText">
        <h2 class="authenticationTitle">Connexion</h2>

        <?php if (!empty($message)): ?>
            <p class="loginMessage"><?= nl2br($message) ?></p>
        <?php endif; ?>

        <form action="index.php?action=login" method="POST" class="authenticationForm">
            <label for="email" class="authenticationLabel">Adresse email</label>
            <input type="text" name="email" id="email" class="authenticationInput" required>
            <label for="password" class="authenticationLabel">Mot de passe</label>
            <input type="password" name="password" id="password" class="authenticationInput" required>
            <button class="button">Se connecter</button>
        </form>

        <p class="authenticationQuestion">Pas de compte ? <a href="index.php?action=register">Inscrivez-vous</a></p>
    </div>
    <div class="authenticationIllustration">
        <img src="/images/mask_group-1.png" class="authenticationPicture" alt="Illustration représentant une bibliothèque pleine de livres">
    </div>
</section>