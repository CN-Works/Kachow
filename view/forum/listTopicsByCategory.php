<?php

$topicsfromcategory = $result["data"]["topicsbycategory"];
use App\DAO;

?>
<div class="topicsbycat-main">
    <?php

    foreach($topicsfromcategory as $topic) {
        ?>
        <p><?= $topic->getTitle()?></p>

        <?php
    }

    ?>
</div>

