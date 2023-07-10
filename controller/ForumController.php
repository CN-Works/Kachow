<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\PostManager;
    use Model\Managers\CategoryManager;
    use Model\Managers\UserManager;
    
    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){
          

           $topicManager = new TopicManager();

            return [
                "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    "topics" => $topicManager->findAll(["creationdate", "DESC"])
                ]
            ];
        
        }

        public function TopicsByCategory($idCategory) {
            // Vérification de l'id
            $idCategory = filter_var($idCategory,FILTER_VALIDATE_INT);

            $topicManager = new TopicManager();
            $categoryManager = new CategoryManager();

            // On récupère les derniers topics par date
            return [
                "view" => VIEW_DIR."forum/listTopicsByCategory.php",
                "data" => [
                    "topicsbycategory" => $topicManager->findAllByTableAndId($idCategory,"category_id",["creationdate", "DESC"]),
                    "categoryname" => $categoryManager->findOneById($idCategory),
                ]
            ];
        }

        public function TopicDetails($topicId){
            // J'utilise le 1er paramère en Id comme expliqué dans l'index, on doit donc utiliser le filter_var
            $topicId = filter_var($topicId,FILTER_VALIDATE_INT);


            $topicManager = new TopicManager();
            $postManager = new PostManager();
            $userManager = new UserManager();
 
            return [
                 "view" => VIEW_DIR."forum/topicDetails.php",
                 "data" => [
                     "topicDetails" => $topicManager->findOneById($topicId),
                     "allUsers" => $userManager->findAll(["creationdate", "ASC"]),
                     "topicPosts" =>  $postManager->findAllByTableAndId($topicId,"topic_id",["creationdate", "ASC"]),
                 ]
            ];
         
        }

        public function CreatePost($topicId) {
            $topicManager = new TopicManager();
            $postManager = new PostManager();

            $newPost = array(
                // On vérifie l'id du topic
                "topic_id" => filter_var($topicId,FILTER_VALIDATE_INT),
                // On vérifie que le texte est correcte.
                "content" => filter_input(INPUT_POST, "comment-text", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                // Récupère la date
                "creationdate" => date('Y-m-d H:i:s'),
                // Pour l'instant, l'utilisateur par défaut (qui écrit les commentaire) sera l'utilisateur "Vic-Thor".
                "user_id" => 5,
            );

            // Redirection vers le topic
            header('Location: http://localhost/PassionEssence/index.php?ctrl=forum&action=topicDetails&id='.$topicId);

            return [
                "view" => VIEW_DIR."forum/topicDetails.php",
                "data" => [
                    "creationPost" => $postManager->add($newPost),
                    "topicDetails" => $topicManager->findOneById($topicId),
                    "topicPosts" =>  $postManager->findAllByTableAndId($topicId,"topic_id",["creationdate", "ASC"]),
                ]
           ];
        }

        public function AllCategories() {

            $categoryManager = new CategoryManager();

            return [
                "view" => VIEW_DIR."forum/listCategories.php",
                "data" => [
                    "categories" => $categoryManager->findAll()
                ]
            ];
        }

        public function ListRedactions() {
            return [
                "view" => VIEW_DIR."forum/listRedactions.php",
            ];
        }

        public function CreateCategoryForm() {
            $categoryManager = new CategoryManager();

            return [
                "view" => VIEW_DIR."forum/createCategories.php",
            ];
        }

        public function CreateCategory() {
            $categoryManager = new CategoryManager();

            $categoryName = filter_input(INPUT_POST, 'category-name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $categoryDescription = filter_input(INPUT_POST, 'category-description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            // Ici le l'image est un lien
            $categoryImage = filter_input(INPUT_POST,"category-image",FILTER_VALIDATE_URL);

            // Redirection vers la liste des catégories
            header('Location: http://localhost/PassionEssence/index.php?ctrl=forum&action=AllCategories');

            // Integration des valeurs dans un tableau pour l'exporter dans la fonction du manager
            $newCategory = array(
                "label" => $categoryName, 
                "description" => $categoryDescription, 
                "image" => $categoryImage,
            );

            return [
                "view" => VIEW_DIR."forum/listCategories.php",
                "data" => [
                    "newcategory" => $categoryManager->add($newCategory),
                    "categories" => $categoryManager->findAll()
                    ]
            ];
        }
    }
