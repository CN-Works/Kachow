<?php
    namespace Model\Entities;

    use App\Entity;
    use App\DAO;

    final class Topic extends Entity{

        private $id;
        private $title;
        private $description;
        private $banner;
        private $user;
        private $creationdate;
        private $closed;
        private $category;

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
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of title
         */ 
        public function getTitle()
        {
                return $this->title;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */ 
        public function setTitle($title)
        {
                $this->title = $title;

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
         * Set the value of user
         *
         * @return  self
         */ 
        public function setUser($user)
        {
                $this->user = $user;

                return $this;
        }

        public function getCreationdate(){
            $formattedDate = $this->creationdate->format("d F Y");
            return $formattedDate;
        }

        public function getFullCreationdate(){
                $formattedDate = $this->creationdate->format("d/m/Y, H:i:s");
                return $formattedDate;
            }

        public function setCreationdate($date){
            $this->creationdate = new \DateTime($date);
            return $this;
        }

        /**
         * Get the value of closed
         */ 
        public function getClosed()
        {
                return $this->closed;
        }

        /**
         * Set the value of closed
         *
         * @return  self
         */ 
        public function setClosed($closed)
        {
                $this->closed = $closed;

                return $this;
        }

        /**
         * Get the value of description
         */ 
        public function getDescription()
        {
                return $this->description;
        }

        /**
         * Set the value of description
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }

        /**
         * Get the value of banner
         */ 
        public function getBanner()
        {
                return $this->banner;
        }

        /**
         * Set the value of banner
         *
         * @return  self
         */ 
        public function setBanner($banner)
        {
                $this->banner = $banner;

                return $this;
        }

        public function getTopicAuthor() {
                $request = "SELECT us.username, us.description, us.role, us.creationdate, us.profileimage FROM topics tp INNER JOIN user us ON tp.user_id = us.id_user AND tp.id_topics = ".$this->id.";";

                $result = DAO::select($request);
                $author = [];

                foreach($result as $person) {
                        $author = $person;
                }

                return $author;
        }

        
        public function getCategory()
        {
                return $this->category;
        }

        public function setCategory($category)
        {
                $this->category = $category;

                return $this;
        }
    }
