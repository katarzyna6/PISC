<?php

class Image extends DbConnect {
    
    private $id_image;
    private $name;
    private $alt;
    private $id_item;

    function __construct($id = null) {
        parent::__construct($id);
    }

    public function getIdImage () {    
        return $this->id_image;
    }
    
    public function setIdImage($id_image) {
        $this->id_image = $id_image;
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


    function insert() {
        $query = "INSERT INTO images (name, alt, id_item)
            VALUES(:name, :alt, :id_item)";

        $query = "INSERT INTO images (name, alt, id_item) VALUES(:name, :alt, :id_item)";
        $result = $this->pdo->prepare($query);
        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        $result->bindValue(':alt', $this->alt, PDO::PARAM_STR);
        $result->bindValue(':id_item', $this->id_item, PDO::PARAM_INT);
        $result->execute();
        $this->id_image = $this->pdo->lastInsertId();
        return $this;
        
    }
        
    function select() {
        $query = "SELECT * FROM images WHERE id_image = :id";
        $result = $this->pdo->prepare($query);
        $result->bindValue('id', $this->id_image, PDO::PARAM_INT);
        $result->execute();
        $datas = $result->fetch();
        
        $this->setName($datas['name']);
        $this->setAlt($datas['alt']);
        $this->setIdItem($datas['id_item']);

        return $this;
    }

    function selectAll() {
        $query ="SELECT * FROM images;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas= $result->fetchAll(); 

        $tab=[];

        foreach($datas as $data) {
            $current = new Image();
            $current->setIdImage($data['id_image']);
            $current->setName($data['name']);
            $current->setAlt($data['alt']);
            $current->setIdItem($data['id_item']);
            array_push($tab, $current);
            }
            return $tab;
    }

    function update() {
        $query ="UPDATE images SET `id_image` = :id_image, `name` = :name, `alt` = :alt, `id_item` = :id_item) WHERE `id_item` = :id_item";

        $result = $this->pdo->prepare($query);
        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        $result->bindValue(':alt', $this->alt, PDO::PARAM_STR);
        $result->bindValue(':id_item', $this->id_item, PDO::PARAM_STR);
        $result->execute();

        $this->id_item = $this->pdo->lastInsertId();
        return $this;  
    }

    function delete() {
        $query ="DELETE FROM images WHERE `id_image` = :id_image";
        $result = $this->pdo->prepare($query);
        $result->bindValue('id_image', $this->id_image, PDO::PARAM_INT);
        $result->execute();           
    }
}