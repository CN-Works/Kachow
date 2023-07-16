<?php

$allUsers = $result["data"]["AllUsers"];
use App\DAO;

?>

<div class="listUsers-main">
    <div class="listUsers-head">
        <h2 class="listUsers-head-title" >Gestion des utilisateurs</h2>
        <p class="listUsers-head-subtitle">Une liste de tout les utilisateurs du forum PassionEssence.</p>
    </div>

    <div class="listUsers-cards">
        <?php
            foreach($allUsers as $user) {
                ?>
                <div class="listUsers-card">
                    <div class="listUsers-card-profile" >
                        <figure class="listUsers-card-profilefig">
                            <img class="listUsers-card-profileimage" src="<?= $user->getProfileimage() ?>" alt="Profile picture of <?= $user->getUsername() ?>">
                        </figure>

                        <h3 class="listUsers-card-username"><?= $user->getUsername() ?></h3>

                        <?php
                            if ($user->getRole() == "admin") {
                                ?>
                                <img class="listUsers-card-adminshield" src="./public/img/shield.png" alt="Admin icon">
                                <?php
                            }
                        ?>

                    </div>
                </div>
                <?php
            }
        ?>
    </div>
</div>