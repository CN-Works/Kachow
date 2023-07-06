<?php

$topic = $result["data"]['topicDetails'];
use App\DAO;

?>

<div class="topicdetails-main">
    <div>
        <h2><?= $topic->getTitle()?></h2>
    </div>
    <div class="topicdetails-topicinfos">

        <div class="topicdetails-topicinfos-left">
            <div class="topicdetails-topicinfos-authorpart">
                <figure class="topicdetails-topicinfos-authorfig">
                    <img class="topicdetails-topicinfos-authorimage" src="<?= $topic->getUser()->getProfileimage()?>" alt="Photo de profile de <?= $topic->getUser()->getUsername()?>">
                </figure>
                <h3 class="topicdetails-topicinfos-author-username"><?= $topic->getUser()->getUsername()?></h3>
            </div>

            <p class="topicdetails-topicinfos-description"><?= $topic->getDescription()?></p>
        </div>

        <figure class="topicdetails-topicinfos-bannerfig" >
            <img class="topicdetails-topicinfos-banner" src="<?= $topic->getBanner()?>" alt="Bannière du topic '<?= $topic->getTitle()?>' de <?= $topic->getUser()->getUsername()?>">
        </figure>
    </div>

</div>