<?php

$topics = $result["data"]['topics'];
use App\DAO;
    
?>
<div class="topiclist-main">
    <div class="general-toppage-titletexts">
        <h2 class="general-toppage-title">Topics</h2>

        <p class="general-toppage-subtitle">
            Tout les derniers articles rédigés par récemment, aucune catégorie spécifique.
            Ils ont été écrit récemment par les membres de la communauté PassionEssence.
            <br>
            <br>
            <a class="general-toppage-redactionlink" href="index.php?ctrl=forum&action=CreateCategoryForm">Rédigez le vôtre !</a>
        </p>
    </div>

    <div class="topiclist-allcards">
        <?php
        foreach($topics as $topic ){

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
                    <p class="topiclist-card-detail-text">Lire</p>
                </a>
            </div>
        <?php
        } ?>
    </div>
</div>



  
