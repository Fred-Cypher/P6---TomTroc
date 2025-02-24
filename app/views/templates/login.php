<h2>Connexion</h2>

<?php if (!empty($message)): ?>
    <p><?= $message ?></p>
<?php endif; ?>

<form action="index.php?action=login" method="POST">
    <label for="email">Adresse email</label>
    <input type="text" name="email" id="email" required>
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" required>
    <button class="submit">Se connecter</button>
</form>

<p>Pas de compte ? <a href="index.php?action=register">Inscrivez-vous</a></p>