<section class="errorPage">
    <h2 class="errorTitle title">Erreur 404</h2>

    <p class="errorMessage">La page demandée n'existe pas</p>

    <?php if (isset($_GET['error']))
        switch ($error):
            case 'notfound' : ?>
                <p class=""> Profil non trouvé</p>
                <?php break; ?>
            <?php endswitch; ?>
</section>