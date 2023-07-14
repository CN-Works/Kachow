<div class="creation-form-main">
    <figure class="creation-form-imagefig">
        <img class="creation-form-image unselectable" src="./public/img/banner_sf23.jpeg" alt="A cool Ferrari image">
    </figure>
    <div class="creation-form-right">
        <?php 
            if (isset($_SESSION["user"])) {
                ?>
                <div class="connection-showprofilezone">
                    <figure class="connection-userfig">
                        <img class="connection-userimg unselectable" src="<?= $_SESSION["user"]->getProfileimage() ?>" alt="Image de profile">
                    </figure>

                    <a class="connection-usernamebox"  href="index.php?ctrl=security&action=Disconnect"><p class="connection-username"><?= $_SESSION["user"]->getUsername() ?></p></a>

                    <a class="connectpage-button"  href="index.php?ctrl=security&action=Disconnect">Se déconnecter</a>
                </div>
                <?php 
            } else {
                ?>
                <form class="creation-form" action="index.php?ctrl=security&action=RegisterUser" method="post">
                    <h2 class="creation-form-title">Créer un compte</h2>
                    
                    <p class="creation-form-inputname">Nom d'utilisateur</p>
                    <input class="creation-form-inputtext" type="text" name="newuser-username">

                    <p class="creation-form-inputname">Mot de passe</p>
                    <input class="creation-form-inputtext" type="password" name="newuser-password">

                    <p class="creation-form-inputname">Répéter le mot de passe</p>
                    <input class="creation-form-inputtext" type="password" name="newuser-password-repeat">

                    <p class="creation-form-inputname">Photo de profile</p>
                    <input class="creation-form-inputtext" type="text" name="newuser-image">

                    <input class="creation-form-submitbutton" type="submit" value="Créer">

                    <a class="connectpage-button"  href="index.php?ctrl=security&action=ConnectUserForm">Se connecter</a>
                </form>
            <?php 
            }
        ?>
    </div>
</div>