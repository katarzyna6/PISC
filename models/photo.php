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


    function insert() {

        $query = "INSERT INTO photo (name, alt, id_item) VALUES(:name, :alt, :id_item)";
        $result = $this->pdo->prepare($query);
        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        $result->bindValue(':alt', $this->alt, PDO::PARAM_STR);
        $result->bindValue(':id_item', $this->id_item, PDO::PARAM_INT);
        $result->execute();
        $this->id_photo = $this->pdo->lastInsertId();
        return $this;
        
    }
        
    function select() {
        $query = "SELECT * FROM photo WHERE id_photo = :id";
        $result = $this->pdo->prepare($query);
        $result->bindValue('id', $this->id_photo, PDO::PARAM_INT);
        $result->execute();
        $datas = $result->fetch();
        
        $this->setName($datas['name']);
        $this->setAlt($datas['alt']);
        $this->setIdItem($datas['id_item']);

        return $this;
    }

    function selectAll() {
        $query ="SELECT * FROM photo;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas= $result->fetchAll(); 

        $tab=[];

        foreach($datas as $data) {
            $current = new Photo();
            $current->setIdPhoto($data['id_photo']);
            array_push($tab, $current);
            }
            return $tab;
    }

    function update() {
        $query ="UPDATE photo SET `id_photo` = :id_photo, `name` = :name, `alt` = :alt, `id_item` = :id_item) WHERE `id_item` = :id_item";

        $result = $this->pdo->prepare($query);
        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        $result->bindValue(':alt', $this->alt, PDO::PARAM_STR);
        $result->bindValue(':id_item', $this->id_item, PDO::PARAM_STR);
        $result->execute();

        $this->id_item = $this->pdo->lastInsertId();
        return $this;  
    }

    function delete() {
        $query ="DELETE FROM photo WHERE `id_photo` = :id_photo";
        $result = $this->pdo->prepare($query);
        $result->bindValue('id_photo', $this->id_photo, PDO::PARAM_INT);
        $result->execute();           
    }
}