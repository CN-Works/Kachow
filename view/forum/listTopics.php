<?php

$topics = $result["data"]['topics'];
    
?>

<h1>liste topics</h1>

<?php
foreach($topics as $topic ){

    ?>
    <style>
        * {
            font-family: "Poppins", sans-serif;
            padding : 0;
            margin : 0;
            box-sizing: border-box;
        }

        .topiclist-card {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 5px;

            background-color: #26292F;
            border-radius: 10px;

            max-width: 35%;
            min-height: 400px;
            margin: 10px;

            color: #ffffff;

            transition: all, 0.5s;
        }

        .topiclist-card:hover {
            background-color: #5E747F;
        }

        .topiclist-card-image {
            max-height: 35%;
        }

        .topiclist-card-description {
            font-style: italic;
        }
    </style>

    <div class="topiclist-card">
        <img class="topiclist-card-image" src="<?=$topic->getBanner()?>" alt="" style=" width: 100%;">
        <h2 class="topiclist-card-title"><?=$topic->getTitle()?></h2>
        <?=
            // Vérifie si la description existe (not NULL or "none")
            $description = $topic->getDescription();
            if (isset($description)) {
                return "<p class='topiclist-card-description'>".$description."</p>";
            }
        ?>
    </div>
    <?php
}


  
