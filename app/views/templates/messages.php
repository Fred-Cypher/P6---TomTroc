<h2>Messagerie</h2>

<section class="messaging">
    <aside class="thread">
        Fil de discussion
        <p>
            <?php
            if ($conversations): ?>
                <?php foreach ($conversations as $conversation): ?>
                    <?php if ($conversation->lastMessage): ?>
                        <a href="index.php?action=messages&user2_id=<?= $conversation->getOtherUserId($_SESSION['user']['id']) ?>&conversation_id=<?= $conversation->getId() ?>">
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
    </aside>
    <article class="conversation">
        <p>
            <?php
            if (isset($_REQUEST['user2_id'])) : {
                    if ($conversation) { ?>
                        <img src="/uploads/avatars/<?= $otherUserAvatar ?>" alt="" class="mediumAvatar">
        <p><?= $otherUserPseudo ?></p>
        <?php foreach ($messages as $message) {
                            if ($message->getSenderId() != $_SESSION['user']['id']) { ?>
                <img src="/uploads/avatars/<?= $conversation->otherUser->getAvatar() ?>" alt="" class="smallAvatar">
                <p class="messageOtherUser">
                    <?= $message->getCreatedAt()->format('H:i') ?>
                    <?php echo $message->getContent(); ?> <br>
                <?php } else { ?>
                <p class="messageCurrentUser">
                    <?= $message->getCreatedAt()->format('H:i') ?>
                    <?php echo $message->getContent(); ?>
                </p>
            <?php } ?>

    <?php };
                    }
    ?>
    <form action="index.php?action=sendMessage" method="POST">
        <input type="hidden" name="otherUserId" value="<?= $otherUserId ?>">
        <input name="content" placeholder="Tapez votre message ici"></input>
        <button type="submit" class="button">Envoyer</button>
    </form>
<?php }
            else: { ?>
    <p>Pas de message à afficher. <br>
        Veuillez sélectionner une conversation existante.</p>
<?php } ?>
<?php endif ?>
</p>
    </article>
</section>