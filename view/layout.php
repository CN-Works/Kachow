<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="icon" href="./public/img/gearbox_light.png">
    <title>PassionEssence.com</title>
</head>
<body>
    <div id="wrapper"> 
       
        <div id="mainpage">
            <!-- c'est ici que les messages (erreur ou succès) s'affichent-->
            <h3 class="message" style="color: red"><?= App\Session::getFlash("error") ?></h3>
            <h3 class="message" style="color: green"><?= App\Session::getFlash("success") ?></h3>
            <header>
                <a class="header-logo unselectable" href="index.php"><img class="header-logo-image" src="./public/img/PassionEssenceLarger_light.png" alt="Passion Essence logo"></a>

                <nav class="header-navbar">

                    <a class="header-navbar-element unselectable" href="index.php?ctrl=forum&action=listTopics"><p class="header-navbar-element-text">Topics</p></a>

                    <a class="header-navbar-element unselectable" href="index.php?ctrl=forum&action=AllCategories"><p class="header-navbar-element-text">Catégories</p></a>

                    <!-- <a class="header-navbar-element unselectable" href="index.php?ctrl=forum&action=ListRedactions"><p class="header-navbar-element-text">Rédaction</p></a> -->
                    <?php
                        // Boutton liste utilisateur
                        if (isset($_SESSION["user"])) {
                            if ($_SESSION["user"]->getRole() == "admin") {
                                ?>
                                <a class="header-navbar-element-admin unselectable" href="index.php?ctrl=security&action=listUsers"><p class="header-navbar-element-text-admin">Utilisateurs</p></a>
                                <?php
                            }
                        }

                        // Vérifie si l'utilisateur est connecté ou non
                        if(isset($_SESSION["user"])){
                            ?>
                            <a class="header-loginicon-user header" href="index.php?ctrl=security&action=ConnectUserForm">
                                <figure class="header-loginicon-userfig">
                                    <img class="header-loginicon-user-image unselectable" src="<?= $_SESSION["user"]->getProfileimage() ?>" alt="<?= $_SESSION["user"]->getUsername() ?> 's Personal icon">
                                </figure>
                            </a>
                            <!-- <a href="./view/security/login.php">Connexion</a>
                            <a href="/security/register.html">Inscription</a>
                            <a href="index.php?ctrl=forum&action=listTopics">Tout les topics</a> -->
                            <?php
                        }
                            else {
                            ?>
                            <a class="header-loginicon header" href="index.php?ctrl=security&action=ConnectUserForm">
                                <img class="header-loginicon-image unselectable" src="./public/img/icon_user.png" alt="Person icon">
                            </a>
                            <!-- <a href="./view/security/login.php">Connexion</a>
                            <a href="/security/register.html">Inscription</a>
                            <a href="index.php?ctrl=forum&action=listTopics">Tout les topics</a> -->
                            <?php
                        }
                
                    
                    ?>
                </nav>
            </header>
            
            <?= $page ?>
        </div>
        <footer>
            <img class="footer-image unselectable" src="./public/img/PassionEssence_light.png" alt="Passion Essence logo">

            <div class="footer-textzone">
                <p class="footer-text" href="">Contacts</p>

                <p class="footer-text" href="">Réglement</p>
            
                <p class="footer-text" href="">Mentions légales</p>

                <p class="footer-text" href="">Données Personnelles</p>
            </div>

            <div class="footer-networks">
                <img class="footer-socialnetwork unselectable" src="./public/img/social_facebook.png" alt="facebook logo">
                <img class="footer-socialnetwork unselectable" src="./public/img/social_instagram.png" alt="Instagram logo">
                <img class="footer-socialnetwork unselectable" src="./public/img/social_twitter.png" alt="Twitter logo">
            </div>
        </footer>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <script>

        $(document).ready(function(){
            $(".message").each(function(){
                if($(this).text().length > 0){
                    $(this).slideDown(500, function(){
                        $(this).delay(3000).slideUp(500)
                    })
                }
            })
            $(".delete-btn").on("click", function(){
                return confirm("Etes-vous sûr de vouloir supprimer?")
            })
            tinymce.init({
                selector: '.post',
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
                content_css: '//www.tiny.cloud/css/codepen.min.css'
            });
        })

        

        /*
        $("#ajaxbtn").on("click", function(){
            $.get(
                "index.php?action=ajax",
                {
                    nb : $("#nbajax").text()
                },
                function(result){
                    $("#nbajax").html(result)
                }
            )
        })*/
    </script>
</body>
</html>