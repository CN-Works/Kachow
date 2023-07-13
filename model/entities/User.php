<?php
    namespace Model\Entities;

    use App\Entity;
    use App\DAO;

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

        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }


        public function getUsername()
        {
                return $this->username;
        }

        public function setUsername($username)
        {
                $this->username = $username;

                return $this;
        }

        public function getDescription()
        {
                return $this->description;
        }

        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }

        public function getPassword()
        {
                return $this->password;
        }

        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        public function getCreationdate(){
                $formattedDate = $this->creationdate->format("d/m/Y, H:i:s");
                return $formattedDate;
        }

        public function setCreationdate($creationdate)
        {
                $this->creationdate = $creationdate;

                return $this;
        }

        public function getRole()
        {
                return $this->role;
        }
 
        public function setRole($role)
        {
                $this->role = $role;

                return $this;
        }

        public function getProfileimage()
        {
                return $this->profileimage;
        }

        public function setProfileimage($profileimage)
        {
                $this->profileimage = $profileimage;

                return $this;
        }
    }
