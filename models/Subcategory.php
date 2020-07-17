<?php

class Subcategory extends DbConnect {

    protected $id_subcategory; 
    protected $name;
    protected $id_category; 
    
    function __construct($id=null) {
        parent::__construct($id);
    }

    public function getIdSubcategory() {
        return $this->id_category;
    }

    public function setIdSubcategory(int $id_subcategory) {
        $this->id_subcategory = $id_subcategory;
    }

    public function getName() {
        return $this->name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function getIdCategory() {
        return $this->id_category;
    }

    public function setIdCategory(string $id_category) {
        $this->id_category = $id_category;
    }