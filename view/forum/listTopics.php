<?php

$topics = $result["data"]['topics'];
    
?>

<h1>liste topics</h1>

<?php
foreach($topics as $topic ){

    ?>

    <div class="topiclist-card">
        <img class="topiclist-card-image" src="<?=$topic->getBanner()?>" alt="">
        <h2 class="topiclist-card-title"><?=$topic->getTitle()?></h2>
        <p class='topiclist-card-description'>Auteur <?= $topic->getId() ?></p>
        <?=
            // Vérifie si la description existe et n'est pas nulle
            $description = $topic->getDescription();
            if (isset($description)) {
                return "<p class='topiclist-card-description'>".$description."</p>";
            }

        ?>
    </div>
    <?php
}


  
