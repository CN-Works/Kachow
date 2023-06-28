<?php
    namespace Model\Entities;

    use App\Entity;

    final class Category extends Entity{

        private $id;
        private $label;
        private $image;

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


        public function getCreationdate(){
            $formattedDate = $this->creationdate->format("d/m/Y, H:i:s");
            return $formattedDate;
        }

        public function setCreationdate($date){
            $this->creationdate = new \DateTime($date);
            return $this;
        }


        public function getLabel()
        {
                return $this->label;
        }

        public function setLabel($label)
        {
                $this->label = $label;

                return $this;
        }


        public function getImage()
        {
                return $this->image;
        }

        public function setImage($image)
        {
                $this->image = $image;

                return $this;
        }
    }
