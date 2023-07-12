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
                    "topicsbycategory" => $topicManager->findAllByColumnAndValue($idCategory,"category_id",["creationdate", "DESC"]),
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
                     "topicPosts" =>  $postManager->findAllByColumnAndValue($topicId,"topic_id",["creationdate", "ASC"]),
                 ]
            ];
         
        }

        // List

        public function AllCategories() {

            $categoryManager = new CategoryManager();

            return [
                "view" => VIEW_DIR."forum/listCategories.php",
                "data" => [
                    "categories" => $categoryManager->findAll()
                ]
            ];
        }

        // Create

        public function CreateTopicForm($wantedCategory) {
            $userManager = new UserManager();
            $categoryManager = new CategoryManager();

            // L'id étant l'id_category, aucune demande de catégorie sera nécessaire puisque déjà mentionné.
            $wantedCategory = filter_var($wantedCategory,FILTER_VALIDATE_INT);

            return [
                "view" => VIEW_DIR."forum/createTopic.php",
                "data" => [
                    "allUsers" => $userManager->findAll(["creationdate", "ASC"]),
                    "category" => $categoryManager->findOneById($wantedCategory),
                ]
            ];
        }

        public function CreateTopic($idCategory) {
            $topicManager = new TopicManager();
            $categoryManager = new CategoryManager();

            $newPost = array(
                // Le titre du topic
                "title" => filter_input(INPUT_POST, "newtopic-title", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                // On vérifie que le texte de description est correcte.
                "description" => filter_input(INPUT_POST, "newtopic-description", FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                // On vérifie si l'image est bien un lien
                "banner" => filter_input(INPUT_POST,"newtopic-image",FILTER_VALIDATE_URL),
                // Status par défaut
                "status" => 0,
                // Récupère la date
                "creationdate" => date('Y-m-d H:i:s'),
                // On vérifie l'id de l'auteur du Topic
                "user_id" => filter_input(INPUT_POST, "newtopic-user", FILTER_VALIDATE_INT),
                // On renseigne la catégorie
                "category_id" => filter_var($idCategory,FILTER_VALIDATE_INT),
            );

            $idCategory = filter_var($idCategory,FILTER_VALIDATE_INT);;


            header("Location: index.php?ctrl=forum&action=TopicsByCategory&id=".$idCategory);

            // On récupère les derniers topics par date
            return [
                "view" => VIEW_DIR."forum/listTopicsByCategory.php",
                "data" => [
                    "newTopic" => $topicManager->add($newPost),
                    "topicsbycategory" => $topicManager->findAllByColumnAndValue($idCategory,"category_id",["creationdate", "DESC"]),
                    "categoryname" => $categoryManager->findOneById($idCategory),
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
                "user_id" => filter_input(INPUT_POST, "comment-user", FILTER_VALIDATE_INT),
            );

            // Redirection vers le topic
            header('Location: index.php?ctrl=forum&action=topicDetails&id='.$topicId);

            return [
                "view" => VIEW_DIR."forum/topicDetails.php",
                "data" => [
                    "creationPost" => $postManager->add($newPost),
                    "topicDetails" => $topicManager->findOneById($topicId),
                    "topicPosts" =>  $postManager->findAllByColumnAndValue($topicId,"topic_id",["creationdate", "ASC"]),
                ]
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
            header('Location: index.php?ctrl=forum&action=AllCategories');

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

        // Delete

        public function DeleteTopic($topicId) {
            $topicManager = new TopicManager();

            $topicId = filter_var($topicId,FILTER_VALIDATE_INT);


            //Redirection vers la liste des topics
            header("Location: index.php?ctrl=forum&action=listTopics");

            return [
                "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    "deleteTopic" =>$topicManager->delete($topicId),
                    "topics" => $topicManager->findAll(["creationdate", "DESC"])
                ]
            ];
        }


        public function DeletePost($postId) {
            $topicManager = new TopicManager();
            $postManager = new PostManager();

            // Ici on va supprimer un post/commentaire de topic via son Id, donc on vérifie que l'id est bien un entier
            $postId = filter_var($postId,FILTER_VALIDATE_INT);

            $topicId = filter_input(INPUT_GET, "wantedtopic", FILTER_VALIDATE_INT);

            // Redirection vers le topic original
            header('Location: index.php?ctrl=forum&action=topicDetails&id='.$topicId);

            return [
                "view" => VIEW_DIR."forum/topicDetails.php",
                "data" => [
                    "deletePost" => $postManager->delete($postId),
                    "topicDetails" => $topicManager->findOneById($topicId),
                    "topicPosts" =>  $postManager->findAllByColumnAndValue($topicId,"topic_id",["creationdate", "ASC"]),
                ]
           ];
        }

        public function DeleteCategory($categoryId) {
            $categoryManager = new CategoryManager();

            // On vérifie si l'id de la catégorie est bien un entier
            $categoryId = filter_var($categoryId,FILTER_VALIDATE_INT);

            // Redirection vers la list des catégories
            header("Location: index.php?ctrl=forum&action=AllCategories");

            return [
                "view" => VIEW_DIR."forum/listCategories.php",
                "data" => [
                    "DeleteCategory" => $categoryManager->delete($categoryId),
                    "categories" => $categoryManager->findAll()
                ]
            ];
        }
    }
