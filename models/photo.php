<?php

class Photo extends DbConnect {
    
    private $id_photo;
    private $name;
    private $alt;
    private $id_item;

    function __construct($id = null) {
        parent::__construct($id);
    }

    
    public function getIdPhoto () {    
        return $this->id_photo;
    }
    
    public function setIdPhoto($id_photo) {
        $this->id_photo = $id_photo;
    }

    public function getName () {    
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }

    public function getAlt () {    
        return $this->alt;
    }
    
    public function setAlt($alt) {
        $this->alt = $alt;
    }

    public function getIdItem () {    
        return $this->id_item;
    }
    
    public function setIdItem($id_item) {
        $this->id_item = $id_item;
    }
}