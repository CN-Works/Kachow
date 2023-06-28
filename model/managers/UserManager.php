<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\TopicManager;

    class TopicManager extends Manager{

        protected $className = "Model\Entities\User";
        protected $tableName = "users";


        public function __construct(){
            parent::connect();
        }


    }