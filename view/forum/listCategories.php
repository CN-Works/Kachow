<?php

$categories = $result["data"]['categories'];
use App\DAO;
    
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
                            echo "<figure class=''><img src='$banner' alt='Bannière de la catégorie ".$category->getLabel()."'></figure>";
                        }
                    ?>
                <h2><?= $category->getLabel() ?></h2>
            </div>
            <?php
        }

        ?>
    </div>
</div>