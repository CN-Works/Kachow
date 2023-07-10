<?php

$topic = $result["data"]['topicDetails'];
use App\DAO;

?>

<div class="topicdetails-main">
    <figure class="topicdetails-topicinfos-bannerfig" >
            <img class="topicdetails-topicinfos-banner unselectable" src="<?= $topic->getBanner()?>" alt="Bannière du topic '<?= $topic->getTitle()?>' de <?= $topic->getUser()->getUsername()?>">
    </figure>

    <div class="topicdetails-topicinfos">

        <div class="topicdetails-topdata-head">
            <!-- Titre du topic -->
            <h2 class="topicdetails-topdata-head-title"><?= $topic->getTitle()?></h2>

            <div class="topicdetails-topdata-author">
                <!-- Icone ronde de la photo de profile -->
                <figure class="topicdetails-topdata-authorfig">
                    <img class="topicdetails-topdata-authorimage unselectable" src="<?= $topic->getUser()->getProfileimage()?>" alt="Photo de profile de <?= $topic->getUser()->getUsername()?>">
                </figure>

                <!-- nom d'utilisateur/auteur du topic -->
                <h3 class="topicdetails-topdata-username"><?= $topic->getUser()->getUsername()?></h3>
            </div>

        </div>

        <p class="topicdetails-topicinfos-description">"<?= $topic->getDescription()?>"</p>
    </div>

</div>