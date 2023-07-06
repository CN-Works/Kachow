<?php

$topic = $result["data"]['topicDetails'];
use App\DAO;

?>

<div class="topicdetails-main">
    <h2><?= $topic->getTitle()?></h2>
    <div class="topicdetails-topicinfos">

        <div class="topicdetails-topicinfos-left">
            <div>
                <figure>
                    <img src="<?= $topic->getUser()->getProfileimage()?>" alt="Photo de profile de <?= $topic->getUser()->getUsername()?>">
                </figure>

                <h3><?= $topic->getUser()->getUsername()?></h3>
            </div>

            <p><?= $topic->getDescription()?></p>
        </div>

        <figure class="topicdetails-topicinfos-bannerfig" >
            <img class="topicdetails-topicinfos-banner" src="<?= $topic->getBanner()?>" alt="Bannière du topic '<?= $topic->getTitle()?>' de <?= $topic->getUser()->getUsername()?>" style="width: 500px;">
        </figure>
    </div>

</div>