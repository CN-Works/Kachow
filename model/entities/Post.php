<?php
    namespace Model\Entities;

    use App\Entity;
    use App\DAO;

    final class Post extends Entity{

        private $id;
        private $content;
        private $creationdate;
        private $user;
        private $topic;

        public function __construct($data){         
            $this->hydrate($data);        
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of content
         *
         * @return  self
         */ 
        public function setContent($content)
        {
                $this->content = $content;

                return $this;
        }

        /**
         * Get the value of user
         */ 
        public function getUser()
        {
                return $this->user;
        }

        /**
         * Get the value of topic
         */ 
        public function getTopic()
        {
                return $this->topic;
        }
    }