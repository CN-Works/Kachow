<?php

$topic = $result["data"]['topicDetails'];
$posts = $result["data"]['topicPosts'];
$users = $result["data"]['allUsers'];
use App\DAO;

?>

<div class="topicdetails-main">
    <figure class="topicdetails-topicinfos-bannerfig" >
            <img class="topicdetails-topicinfos-banner unselectable" src="<?= $topic->getBanner()?>" alt="Bannière du topic '<?= $topic->getTitle()?>' de <?= $topic->getUser()->getUsername()?>">
    </figure>

    <div class="topicdetails-topicinfos">

        <div class="topicdetails-topdata-head">
            <!-- Titre du topic -->
            <h2 class="topicdetails-topdata-head-title"><?= $topic->getTitle()?></h2>

            <div class="topicdetails-topdata-author">
                <!-- Icone ronde de la photo de profile -->
                <figure class="topicdetails-topdata-authorfig">
                    <img class="topicdetails-topdata-authorimage unselectable" src="<?= $topic->getUser()->getProfileimage()?>" alt="Photo de profile de <?= $topic->getUser()->getUsername()?>">
                </figure>

                <!-- nom d'utilisateur/auteur du topic -->
                <h3 class="topicdetails-topdata-username"><?= $topic->getUser()->getUsername()?></h3>
            </div>

        </div>

        <p class="topicdetails-topicinfos-description">"<?= $topic->getDescription()?>"</p>

        <div class="topicdetails-topdata-downpage">
            <div class="topicdetails-topdata-downpage-left">
                <a class="topicdetails-topdata-category" href="index.php?ctrl=forum&action=TopicsByCategory&id=<?= $topic->getCategory()->getId()?>">
                    <?= $topic->getCategory()->getLabel()?>
                </a>

                <p>, crée le <?= $topic->getCreationdate()?></p>
            </div>

            <?php
                // On vérifie que l'utilisateur est connecté
                if (isset($_SESSION["user"])) {
                    // Soit l'utilisateur à écrit ce post, soit il est admin
                    if (($_SESSION["user"]->getId() == $topic->getUser()->getId()) or $_SESSION["user"]->getRole() == "admin") {
                        ?>
                        <div class="topicdetails-topdata-downpage-left">
                            <a class="topicdetails-topdata-downpage-deletebutton" href="index.php?ctrl=forum&action=DeleteTopic&id=<?= $topic->getId()?>"><img class="topicdetails-postbox-deletebuttonimage unselectable" src="./public/img/delete-2.png" alt="Delete icon"></a>
                        </div>
                        <?php
                    }
                }
            ?>
        </div>
    </div>

    <div class="topicdetails-postpart">

        <h3 class="topicdetails-postpart-headtitle">Commentaires</h3>
        
        <?php
            if (isset($_SESSION["user"])) {
                ?>
                <form class="topicdetails-postpart-writer" action="index.php?ctrl=forum&action=CreatePost&id=<?= $topic->getId()?>" method="post">
                    <textarea class="topicdetails-postpart-writer-text" name="comment-text" cols="10" rows="4" placeholder="écrivez un commentaire ici.."></textarea>

                    <button class="topicdetails-postpart-writer-submit">Poster</button>
                </form>
                <?php
            }
        ?>

        <?php
        
        if (isset($posts)) {
            foreach($posts as $post) {
                ?>
                <div class="topicdetails-postbox">
                    <div class="topicdetails-postbox-author">
                        <div class="topicdetails-postbox-author-left">
                            <figure class="topicdetails-postbox-profilefig">
                                <img class="topicdetails-postbox-profileimage unselectable" src="<?= $post->getUser()->getProfileimage()?>" alt="<?= $post->getUser()->getUsername()?>'s profile picture">
                            </figure>
                            <p class="topicdetails-postbox-username"><?= $post->getUser()->getUsername()?></p>

                            <?php
                                // On vérifie si le l'auteur du topic est l'auteur du post/commentaire, pour ajouter une badge
                                if ($post->getUser()->getId() == $topic->getUser()->getId()) {
                                    ?>
                                    <p class="topicdetails-postbox-authorcheck">(Auteur)</p>
                                    <?php
                                }
                            ?>
                        </div>

                        <a class="topicdetails-postbox-deletebutton" href="index.php?ctrl=forum&action=DeletePost&id=<?= $post->getId()?>&wantedtopic=<?= $topic->getId()?>"><img class="topicdetails-postbox-deletebuttonimage unselectable" src="./public/img/delete.png" alt="Delete icon"></a>
                    </div>
                    <p class="topicdetails-postbox-text"><?= $post->getContent()?></p>

                    <p class="topicdetails-postbox-date">le <?= $post->getReadableCreationdate() ?>, <?= date_format($post->getCreationdate(),"G") ?>h<?= date_format($post->getCreationdate(),"i") ?></p>
                </div>
                <?php
            }
        }

        ?>
    </div>

</div>