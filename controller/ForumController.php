<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\PostManager;
    use Model\Managers\CategoryManager;
    
    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){
          

           $topicManager = new TopicManager();

            return [
                "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    "topics" => $topicManager->findAll()
                ]
            ];
        
        }

        public function TopicDetails($topicId){
            // J'utilise le &er paramère en Id comme expliqué dans l'index, on doit donc utiliser le filter_var
            $topicId = filter_var($topicId,FILTER_VALIDATE_INT);


            $topicManager = new TopicManager();
 
            return [
                 "view" => VIEW_DIR."forum/topicDetails.php",
                 "data" => [
                     "topicDetails" => $topicManager->findOneById($topicId)
                 ]
             ];
         
         }

        public function AllCategories() {

            $categoryManager = new CategoryManager;

            return [
                "view" => VIEW_DIR."forum/listCategories.php",
                "data" => [
                    "categories" => $categoryManager->findAll()
                ]
            ];
        }

    }
