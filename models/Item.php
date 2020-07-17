<?php

class Item extends DbConnect {
    
    private $id_item;
    private $name;
    private $description;
    private $price;
    private $avis;
    private $note;
    private $id_category;
    private $id_subcategory;
    private $id_brand;

    function __construct($id = null) {
        parent::__construct($id);
    }

    
    public function getIdItem () {    
        return $this->id_item;
    }
    
    public function setIdItem($id_item) {
        $this->id_item = $id_item;
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

    public function getPrice () {    
        return $this->price;
    }
    
    public function setPrice($price) {
        $this->price = $price;
    }

    public function getAvis () {    
        return $this->avis;
    }
    
    public function setAvis($avis) {
        $this->avis = $avis;
    }

    public function getNote () {    
        return $this->note;
    }
    
    public function setNote($note) {
        $this->note = $note;
    }

    public function getICategory () {    
        return $this->id_category;
    }
    
    public function setIdCategory($id_category) {
        $this->id_category = $id_category;
    }

    public function getIdSubcategory () {    
        return $this->id_subcategory;
    }
    
    public function setIdSubcategory($id_subcategory) {
        $this->id_subcategory = $id_subcategory;
    }

    public function getIdBrand () {    
        return $this->id_brand;
    }
    
    public function setIdBrand($id_brand) {
        $this->id_brand = $id_brand;
    }
}