<?php

use App\DAO;
    
?>

<h2>Créer une catégorie</h2>

<form action="index.php?ctrl=forum&action=CreateCategory" method="post">
    <p>Nom de catégorie</p>
    <input type="text" name="category-name">

    <p>Image</p>
    <input type="text" name="category-image">

    <p>Description</p>
    <input type="text" name="category-description">

    <input type="submit" value="Créer">
</form>