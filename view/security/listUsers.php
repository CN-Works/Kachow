<?php

use Model\Managers\UserManager;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;

$userManager = new UserManager();
$topicManager = new TopicManager();
$postManager = new PostManager();

$allUsers = $result["data"]["AllUsers"];
$allTopics = $result["data"]["AllTopics"];
$allPosts = $result["data"]["AllPosts"];
use App\DAO;

// On compte le nombre de topics par utilisateur
$calcTopics = array();
foreach ($allTopics as $topic) {
    if (isset($calcTopics[$topic->getUser()->getId()])) {
        $calcTopics[$topic->getUser()->getId()] = $calcTopics[$topic->getUser()->getId()] + 1;
    } else {
        $calcTopics[$topic->getUser()->getId()] = 1;
    }
}

// On compte le nombre de posts par utilisateur
$calcPosts = array();
foreach ($allPosts as $post) {
    if (isset($calcPosts[$post->getUser()->getId()])) {
        $calcPosts[$post->getUser()->getId()] = $calcPosts[$post->getUser()->getId()] + 1;
    } else {
        $calcPosts[$post->getUser()->getId()] = 1;
    }
}


?>

<div class="listUsers-main">
    <div class="listUsers-head">
        <h2 class="listUsers-head-title" >Gestion des utilisateurs</h2>
        <p class="listUsers-head-subtitle">Une liste de tout les utilisateurs du forum PassionEssence.</p>
    </div>

    <div class="listUsers-cards">
        <?php
            foreach($allUsers as $user) {

                // Si l'utilisateur n'as écrit aucun topic, le compteur tombe à zéro
                if (isset($calcTopics[$user->getId()])) {
                    $calcTopics[$user->getId()] = $calcTopics[$user->getId()];
                } else {
                    $calcTopics[$user->getId()] = 0;
                }

                // Si l'utilisateur n'as écrit aucun post, le compteur tombe à zéro
                if (isset($calcPosts[$user->getId()])) {
                    $calcPosts[$user->getId()] = $calcPosts[$user->getId()];
                } else {
                    $calcPosts[$user->getId()] = 0;
                }

                ?>
                <div class="listUsers-card">
                    <div class="listUsers-card-profile" >
                        <figure class="listUsers-card-profilefig">
                            <img class="listUsers-card-profileimage" src="<?= $user->getProfileimage() ?>" alt="Profile picture of <?= $user->getUsername() ?>">
                        </figure>

                        <h3 class="listUsers-card-username"><?= $user->getUsername() ?></h3>

                        <?php
                            if ($user->getRole() == "admin") {
                                ?>
                                <img class="listUsers-card-adminshield" src="./public/img/shield.png" alt="Admin icon">
                                <?php
                            }
                        ?>

                    </div>

                    <div class="listUsers-card-element">
                        <h4 class="listUsers-card-element-title">Topics</h4>
                        <p class="listUsers-card-element-value">
                            <?=
                                $amount = $calcTopics[$user->getId()];
                            ?>
                        </p>
                    </div>

                    <div class="listUsers-card-element">
                        <h4 class="listUsers-card-element-title">Commentaires</h4>
                        <p class="listUsers-card-element-value">
                            <?=
                                $amount = $calcPosts[$user->getId()];
                            ?>
                        </p>
                    </div>

                    <a class="listUsers-card-elementbutton-search" href="">
                        <img class="listUsers-card-element-search" src="./public/img/loupe.png" alt="">
                    </a>
                </div>
                <?php
            }
        ?>
    </div>
</div>