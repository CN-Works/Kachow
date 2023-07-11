<?php

use App\DAO;
// On récupère la liste de tout les utilisateurs (temporaire)
$users = $result["data"]['allUsers'];
$category = $result["data"]['category'];
    
?>

<div class="creation-form-main">
    <figure class="creation-form-imagefig">
        <img class="creation-form-image" src="<?= $category->getImage() ?>" alt="A cool Ferrari image">
    </figure>
    <div class="creation-form-right">
        <form class="creation-form" action="index.php?ctrl=forum&action=CreateTopic&id=<?= $category->getId() ?>" method="post">
            <h2 class="creation-form-title">Nouveau Topic</h2>

            <div class="topiclist-card-description-author" style="align-self: flex-start; margin: 5px 0;">
                <p class="topiclist-card-description-authortext"><?= $category->getLabel() ?></p>
            </div>
            
            <p class="creation-form-inputname">Utilisateur</p>
            <select class="topicdetails-postpart-writer-select" name="comment-user" style="margin: 5px 0;">
                <?php
                foreach($users as $user) {
                ?>
                    <option class="topicdetails-postpart-writer-selectoption" value="<?= $user->getId()?>"><?= $user->getUsername()?></option>
                <?php
                }
                ?>
            </select>

            <p class="creation-form-inputname">Titre</p>
            <input class="creation-form-inputtext" type="text" name="newtopic-title">

            <p class="creation-form-inputname">Image</p>
            <input class="creation-form-inputtext" type="text" name="newtopic-image">

            <p class="creation-form-inputname">Description</p>
            <input class="creation-form-inputtext" type="text" name="newtopic-description">

            <input class="creation-form-submitbutton" type="submit" value="Créer">
        </form>
    </div>
</div>