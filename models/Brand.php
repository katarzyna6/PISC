<?php

class Brand extends DbConnect {
    
    private $id_brand;
    private $name;
    private $description;

    function __construct($id = null) {
        parent::__construct($id);
    }

    public function getIdBrand () {    
        return $this->id_brand;
    }
    
    public function setIdBrand($id_brand) {
        $this->id_brand = $id_brand;
    }

    public function getName () {    
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }

    public function getDescription () {    
        return $this->description;
    }
    
    public function setDescription($description) {
        $this->description = $description;
    }
}