<?php

$topics = $result["data"]['topics'];
use App\DAO;
    
?>
<div class="topiclist-main">
    <div>
        <h2>liste topics</h2>

        <p>Tout les derniers articles rédigés par récemment, aucune catégorie spécifique.</p>
    </div>

    <div class="topiclist-allcards">
        <?php
        foreach($topics as $topic ){

            ?>
            <div class="topiclist-card">
                <figure class="topiclist-card-figure">
                    <img class="topiclist-card-image unselectable" src="<?=$topic->getBanner()?>" alt="">
                </figure>
                <!-- // if (isset($topic->getBanner())) {
                //     echo "<img class='topiclist-card-image unselectable' src='".$topic->getBanner()."' alt=''>";
                // } -->
                <h2 class="topiclist-card-title"><?=$topic->getTitle()?></h2>
                <p class='topiclist-card-description'>Ouvert par <?= $topic->getUser()->getUsername() ?> le <?= $topic->getCreationdate()?></p>
            </div>
        <?php
        } ?>
    </div>
</div>



  
