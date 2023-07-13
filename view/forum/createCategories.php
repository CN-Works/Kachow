<?php

use App\DAO;
    
?>

<div class="creation-form-main">
    <figure class="creation-form-imagefig">
        <img class="creation-form-image" src="./public/img/banner_lemansferrari.jpg" alt="A cool Ferrari image">
    </figure>
    <div class="creation-form-right">
        <form class="creation-form" action="index.php?ctrl=forum&action=CreateCategory" method="post">
            <h2 class="creation-form-title">Nouvelle catégorie</h2>

            <p class="creation-form-inputname">Nom de catégorie</p>
            <input class="creation-form-inputtext" type="text" name="category-name">

            <p class="creation-form-inputname">Image</p>
            <input class="creation-form-inputtext" type="text" name="category-image">

            <p class="creation-form-inputname">Description</p>
            <input class="creation-form-inputtext" type="text" name="category-description">

            <input class="creation-form-submitbutton" type="submit" value="Créer">
        </form>
    </div>
</div>