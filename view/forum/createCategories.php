<?php

use App\DAO;
    
?>

<div class="creation-form-main">
    <figure class="creation-form-imagefig">
        <img class="creation-form-image" src="https://www.hdcarwallpapers.com/walls/ferrari_499p_le_mans_hypercar_2022_4k-HD.jpg" alt="A cool Ferrari image">
    </figure>
    <div class="creation-form-right">
        <form class="creation-form" action="index.php?ctrl=forum&action=CreateCategory" method="post">
            <h2 class="creation-form-title">Créer une catégorie</h2>

            <p>Nom de catégorie</p>
            <input type="text" name="category-name">

            <p>Image</p>
            <input type="text" name="category-image">

            <p>Description</p>
            <input type="text" name="category-description">

            <input type="submit" value="Créer">
        </form>
    </div>
</div>