<div class="creation-form-main">
    <figure class="creation-form-imagefig">
        <img class="creation-form-image" src="https://www.automobilesreview.com/img/2023-bmw-m3-touring/2023-bmw-m3-touring-07.jpg" alt="A cool Ferrari image">
    </figure>
    <div class="creation-form-right">
        <?php 
            if (isset($_SESSION["user"])) {
                ?>
                <figure class="connection-userfig">
                    <img class="connection-userimg" src="<?= $_SESSION["user"]->getProfileimage() ?>" alt="Image de profile">
                </figure>

                <h3><?= $_SESSION["user"]->getUsername() ?></h3>
                <?php 
            } else {
                ?>
                <form class="creation-form" action="index.php?ctrl=security&action=ConnectUser" method="post">
                    <h2 class="creation-form-title">Se connecter</h2>
                    
                    <p class="creation-form-inputname">Nom d'utilisateur</p>
                    <input class="creation-form-inputtext" type="text" name="connect-username">

                    <p class="creation-form-inputname">Mot de passe</p>
                    <input class="creation-form-inputtext" type="password" name="connect-password">


                    <input class="creation-form-submitbutton" type="submit" value="Créer">

                    <a class="connectpage-button"  href="index.php?ctrl=security&action=RegisterUserForm">Créer un compte</a>
                </form>
            <?php 
            }
        ?>
    </div>
</div>