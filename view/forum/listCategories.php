<?php

$categories = $result["data"]['categories'];
use App\DAO;

$card_count = 1;
    
?>

<div class="allcategory-main">

    <div class="allcategory-allcards">
        <?php

        foreach($categories as $category) {
            ?>
            <div class="allcategory-card">
                <?php
                    $banner = $category->getImage();

                    if (isset($banner)) {
                        echo "<figure class='allcategory-card-bannerfig'><img class='allcategory-card-banner' src='$banner' alt='Bannière de la catégorie ".$category->getLabel()."'></figure>";
                    }
                ?>
                <div class="allcategory-card-textside">
                    <h2 class="allcategory-card-title"><?= $category->getLabel() ?></h2>
                    <p class="allcategory-card-subtitle"><?= $category->getDescription() ?></p>
                </div>
            </div>
            <?php
        }

        ?>
    </div>
</div>