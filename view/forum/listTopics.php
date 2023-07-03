<?php

$topics = $result["data"]['topics'];
use App\DAO;
    
?>
<div class="topiclist-main">
    <div class="topiclist-titletexts">
        <h2 class="topiclist-title">liste des topics</h2>

        <p class="topiclist-subtitle">
            Tout les derniers articles rédigés par récemment, aucune catégorie spécifique.
            Ils ont été écrit récemment par les membres de la communauté PassionEssence.
        </p>
    </div>

    <div class="topiclist-allcards">
        <?php
        foreach($topics as $topic ){

            ?>
            <div class="topiclist-card">
                <figure class="topiclist-card-figure">
                    <img class="topiclist-card-image unselectable" src="<?=$topic->getBanner()?>" alt="">
                </figure>

                <h2 class="topiclist-card-title"><?=$topic->getTitle()?></h2>
                <div class="topiclist-card-description">
                    <div class="topiclist-card-description-author">
                        <p class="topiclist-card-description-authortext"><?= $topic->getUser()->getUsername() ?></p>
                    </div>
                    <p>le <?= $topic->getCreationdate()?></p>
                </div>

                <a class="topiclist-card-detail" href="">
                    <p class="topiclist-card-detail-text">Lire</p>
                </a>
            </div>
        <?php
        } ?>
    </div>
</div>



  
