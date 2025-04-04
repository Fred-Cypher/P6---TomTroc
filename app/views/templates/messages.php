<h2>Messagerie</h2>

<section class="messaging">
    <aside class="thread">
        Fil de discussion
        <p>
            <?php 
                if($conversations){
                    foreach($conversations as $conversation){
                        echo $conversation->getId() . '-' .$conversation->getUser2Id() . '<br>';
                    }
                }  
            ?>
        </p>
        <!-- Si conversations NOT EMPTY renvoie les conversation du $_SESSION user, avec le dernier message tronqué-->
        <div>Avatar, pseudo utilisateur et heure et début texte dernier message</div>
    </aside>
    <article class="conversation">
        <p>
            Espace vide
            <?php
            $otherUserId = isset($_GET['user2_id']) ? (int) $_GET['user2_id'] : 0;
            if (isset($_REQUEST['user2_id'])) : { 
                foreach($messages as $message){
                    echo '<p>Avatar heure <br></p>';
                    echo $message->getContent();
                };
                ?>
        <form action="index.php?action=sendMessage" method="POST">
            <input type="hidden" name="otherUserId" value="<?= $otherUserId ?>">
            <input name="content"></input>
            <button type="submit">Envoyer</button>
        </form>
    <?php } else: { ?>
        <p>Pas de message à afficher. <br>
            Veuillez sélectionner une conversation existante.</p>
    <?php }
    endif

    ?>
    <!-- si messages IS NOT EMPTY renvoie les messages de la conversation -->
    <!-- affiche le bouton si CONVERSATION existe-->
    </p>
    </article>
</section>