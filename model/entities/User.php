<?php
    namespace Model\Entities;

    use App\Entity;

    final class User extends Entity{

        private $id;
        private $username;
        private $description;
        private $password;
        private $creationdate;
        private $role;
        private $profileimage;

        public function __construct($data){         
            $this->hydrate($data);        
        }
 

        public function getId()
        {
                return $this->id;
        }


        public function getUsername()
        {
                return $this->username;
        }


        public function getDescription()
        {
                return $this->description;
        }

        public function getCreationdate(){
            $formattedDate = $this->creationdate->format("d/m/Y, H:i:s");
            return $formattedDate;
        }


        public function getRole()
        {
                return $this->role;
        }


        public function getProfileimage()
        {
                return $this->profileimage;
        }

        public function getPassword()
        {
                return $this->password;
        }
    }
