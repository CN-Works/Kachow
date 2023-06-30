<?php

$topics = $result["data"]['topics'];
use App\DAO;
    
?>
<div class="topiclist-main">
    <h1>liste topics</h1>

    <div class="topiclist-allcards">
        <?php
        foreach($topics as $topic ){

            ?>
            <div class="topiclist-card">
                <img class="topiclist-card-image unselectable" src="<?=$topic->getBanner()?>" alt="">
                <h2 class="topiclist-card-title"><?=$topic->getTitle()?></h2>
                <p class='topiclist-card-description'>Ouvert par <?= $topic->getTopicAuthor()["username"] ?> le <?= $topic->getCreationdate()?></p>
            </div>
        <?php
        } ?>
    </div>
</div>



  
