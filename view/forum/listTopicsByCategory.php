<?php

$topicsfromcategory = $result["data"]["topicsbycategory"];
$categoryInfo = $result["data"]["categoryname"];
use App\DAO;

?>
<div class="topiclist-main">
    <div class="general-toppage-titletexts">
        <h2 class="general-toppage-title"><?= $categoryInfo->getLabel() ?></h2>

        <p class="general-toppage-subtitle">
            Tout les derniers articles rédigés par récemment, écrit par les membres de la communauté.
            <br>
            <?= $categoryInfo->getDescription() ?>
            <?php
                //On va chercher le formulaire de création de topic en insérant l'id de catégorie actuelle, pour automatiser la création du topic en fonction de celle-ci.
                if (isset($_SESSION["user"])) {
                    ?>
                    <br>
                    <br>
                    <a class="general-toppage-redactionlink unselectable" href="index.php?ctrl=forum&action=CreateTopicForm&id=<?= $categoryInfo->getId() ?>">Nouveau topic</a>
                    <?php

                    // Button supprimer, admin only
                    if ($_SESSION["user"]->getRole() == "admin") {
                        ?>
                        <br>
                        <br>
                        <a class="general-toppage-delete unselectable" href="index.php?ctrl=forum&action=DeleteCategory&id=<?= $categoryInfo->getId() ?>">Supprimer</a>
                        <?php
                    }
                }
            ?>
        </p>
    </div>

    <div class="topiclist-allcards">
        <?php

        if (isset($topicsfromcategory)) {
            foreach($topicsfromcategory as $topic ){

                ?>
                <div class="topiclist-card">
                    <?php
                    $banner = $topic->getBanner();
    
                    if (isset($banner)) {
                        echo "<figure class='topiclist-card-figure'>
                        <img class='topiclist-card-image unselectable' src='$banner' alt=''>
                        </figure>";
                    }
    
                    ?>
    
                    <h2 class="topiclist-card-title"><?=$topic->getTitle()?></h2>
                    <div class="topiclist-card-description">
                        <div class="topiclist-card-description-author">
                            <p class="topiclist-card-description-authortext"><?= $topic->getUser()->getUsername() ?></p>
                        </div>
                        <p>le <?= $topic->getCreationdate()?></p>
                    </div>
    
                    <a class="topiclist-card-detail" href="index.php?ctrl=forum&action=topicDetails&id=<?=$topic->getId()?>">
                        <p class="topiclist-card-detail-text unselectable">Lire</p>
                    </a>
                </div>
            <?php
            }
        }

        ?>
    </div>
</div>

