<section class="messaging">
    <aside class="thread">
        <h2 class="title messagingTitle">Messagerie</h2>
        <p>
            <?php
            if ($conversations): ?>
                <?php foreach ($conversations as $conversation): ?>
                    <?php if ($conversation->lastMessage): ?>
                        <?php
                        $isConversationActive = isset($_REQUEST['user2_id']) && ($_REQUEST['user2_id'] == $conversation->getOtherUserId($_SESSION['user']['id']));
                        $conversationClass = $isConversationActive ? 'threadBadge active-conversation' : 'threadBadge';
                        ?>
                        <div class="<?= $conversationClass ?>">
                            <a href="index.php?action=messages&user2_id=<?= $conversation->getOtherUserId($_SESSION['user']['id']) ?>&conversation_id=<?= $conversation->getId() ?>">
                                <div class="conversationBadge">
                                    <div>
                                        <img src="/uploads/avatars/<?= htmlspecialchars($conversation->otherUser->getAvatar()) ?>" alt="Avatar de l'autre utilisateur de la conversation" class="mediumAvatar">
                                    </div>
                                    <div class="conversation">
                                        <div class="conversationDetail">
                                            <div class="conversationPseudo"><?= htmlspecialchars($conversation->otherUser->getPseudo()) ?></div>
                                            <div class="conversationHour"><?= $conversation->lastMessage->getCreatedAt()->format('H:i') ?></div>
                                        </div>
                                        <div class="conversationLastMessage">
                                            <?= htmlspecialchars($conversation->lastMessage->getContent()) ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="noConversation">
                            Aucun message trouvé.
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </p>
    </aside>
    <article class="messages">
        <?php if (isset($_REQUEST['user2_id'])) : {
            if ($conversation) { ?>
                <div class="messageDisplay">
                    <div class="messagesHeader">
                        <img src="/uploads/avatars/<?= $otherUserAvatar ?>" alt="Avatar de l'autre utilisateur"
                            class="mediumAvatar">
                        <p class="messagePseudo"><?= $otherUserPseudo ?></p>
                    </div>
                </div>
                <div class="allMessages">
                    <?php foreach ($messages as $message) {
                        if ($message->getSenderId() != $_SESSION['user']['id']) { ?>
                            <p class="messageOtherUser">
                                <div class="messageHeader">
                                    <img src="/uploads/avatars/<?= $otherUserAvatar ?>" alt="Avatar de l'expéditeur du message" class="smallAvatar">
                                    <div class="messageDate">
                                        <?= $message->getCreatedAt()->format('d:m  H:i') ?>
                                    </div>
                                </div>
                                <div class="messageContentOther">
                                    <?= htmlspecialchars($message->getContent()) ?> <br>
                                </div>
                            </p>
                        <?php } else { ?>
                            <div class="messageCurrentUser">
                                <div class="messageDateCurrent">
                                    <?= $message->getCreatedAt()->format('d:m  H:i') ?>
                                </div>
                                <div class="messageContentCurrent">
                                    <?= htmlspecialchars($message->getContent()) ?>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            <?php } ?>
            <form action="index.php?action=sendMessage" method="POST" class="sendMessage">
                <input type="hidden" name="otherUserId" value="<?= $_REQUEST['user2_id'] ?? '' ?>">
                <input name="content" placeholder="Tapez votre message ici" class="messageInput">
                <button type="submit" class="sendMessageButton">Envoyer</button>
            </form>
        <?php } else: { ?>
            <p class="noMessage">Pas de message à afficher. <br>
                Veuillez sélectionner une conversation existante.</p>
        <?php } ?>
        <?php endif ?>
    </article>
</section>