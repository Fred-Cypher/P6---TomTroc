<h2>Messagerie</h2>

<section class="messaging">
    <aside class="thread">
        Fil de discussion
        <p>
            <?php
            if ($conversations): ?>
                <?php foreach ($conversations as $conversation): ?>
                    <?php if ($conversation->lastMessage): ?>
                        <a href="index.php?action=messages&user2_id=<?= $conversation->getUser2Id() ?>">
                            <img src="/uploads/avatars/<?= $conversation->otherUser->getAvatar() ?>" alt="" class="mediumAvatar">
                            <?= $conversation->otherUser->getPseudo() ?><br>
                            <?= $conversation->lastMessage->getCreatedAt()->format('H:i') ?><br>
                            Message : <?= $conversation->lastMessage->getContent() ?><br>
                            
                        </a><br>
                    <?php else: ?>
                        Aucun message trouvé.<br>
                    <?php endif; ?>
                <?php endforeach; ?>
                Compteur : <?= $unreadCount ?>
            <?php endif; ?>
        </p>
        <!-- Si conversations NOT EMPTY renvoie les conversation du $_SESSION user, avec le dernier message tronqué-->
    </aside>
    <article class="conversation">
        <p>
            <?php
            if (isset($_REQUEST['user2_id'])) : {
                    foreach ($messages as $message) {
                        echo '<p>Avatar heure <br></p>';
                        echo $message->getContent();
                    };
            ?>
        <form action="index.php?action=sendMessage" method="POST">
            <input type="hidden" name="otherUserId" value="<?= $otherUserId ?>">
            <input name="content" placeholder="Tapez votre message ici"></input>
            <button type="submit">Envoyer</button>
        </form>
    <?php }
            else: { ?>
        <p>Pas de message à afficher. <br>
            Veuillez sélectionner une conversation existante.</p>
<?php }
            endif ?>
<!-- si messages IS NOT EMPTY renvoie les messages de la conversation -->
<!-- affiche le bouton si CONVERSATION existe-->
</p>
    </article>
</section>