<h2>Inscription</h2>

<?php if (!empty($message)): ?>
    <p><?= $message ?></p>
<?php endif; ?>

<form action="index.php?action=register" method="POST">
    <label for="pseudo">Pseudo</label>
    <input type="text" name="pseudo" id="pseudo" required>
    <label for="email">Adresse email</label>
    <input type="text" name="email" id="email" required>
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" required>
    <button class="submit">S'inscrire</button>
</form>

<p>Déjà inscrit ? <a href="index.php?action=login">Connectez-vous</a></p>