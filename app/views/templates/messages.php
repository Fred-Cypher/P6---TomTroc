<h2>Messagerie</h2>

<section class="messaging">
    <aside class="thread">
        Fil de discussion
        <p>
            <?php
            if ($conversations) {
                foreach ($conversations as $conversation) {
                    $lastMessage = $this->messagesRepository->getLastMessageByConversationId($conversation->getId());
                    $otherUser = $this->userRepository->getUserById($conversation->getUser2Id());
                    if ($lastMessage) {
                        echo '<a href="index.php?action=messages&user2_id='.  $conversation->getUser2Id() .'"><img src="/uploads/avatars/'. $otherUser->getAvatar() . '" alt="" class="mediumAvatar">';
                        echo $otherUser->getPseudo() . '<br>';
                        echo $lastMessage->getCreatedAt()->format('H:i') . '<br>';
                        echo "Message : " . $lastMessage->getContent() . '</a><br>';
                    } else {
                        echo "Aucun message trouvé." . '<br>';
                    }
                }
            }
            ?>
        </p>
        <!-- Si conversations NOT EMPTY renvoie les conversation du $_SESSION user, avec le dernier message tronqué-->
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
            <input name="content" placeholder="Tapez votre message ici"></input>
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