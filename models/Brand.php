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

    function insert(){
    
        $query = "INSERT INTO brands (id_brand, name, description)
            VALUES(:id_brand, :name, :description)";

        $result = $this->pdo->prepare($query);
        $result->bindValue(':id_brand', $this->id_brand, PDO::PARAM_INT);
        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        $result->bindValue(':description', $this->description, PDO::PARAM_STR);
        $result->execute();

        $this->id_brand = $this->pdo->lastInsertId();
        return $this;
    }

    public function select(){

        $query = "SELECT * FROM brands WHERE id_brand = :id";
        $result = $this->pdo->prepare($query);
        $result->bindValue('id', $this->id_brand, PDO::PARAM_INT);
        $result->execute();
        $datas = $result->fetch();
        
        $this->setIdBrand($datas['id_brand']);
        $this->setName($datas['name']);
        $this->setDescription($datas['description']);

        return $this;
    }

    public function selectAll(){
    $query ="SELECT * FROM brands;";
    $result = $this->pdo->prepare($query);
    $result->execute();
    $datas= $result->fetchAll(); 

    $tab=[];

    foreach($datas as $data) {
        $current = new Brand();
        $current->setIdBrand($data['id_brand']);
        $current->setName($data['name']);
        $current->setDescription($data['description']);
        array_push($tab, $current);
        }
        return $tab;
    }

    public function update(){
        
        $query ="UPDATE brands SET `name`= :name, `description` = :description WHERE `id_brand` = :id_brand";
        $result = $this->pdo->prepare($query);
        
        $result->bindValue('name', $this->name, PDO::PARAM_STR);
        $result->bindValue('description', $this->description, PDO::PARAM_STR);
        $result->bindValue('id_brand', $this->id_brand, PDO::PARAM_INT);
        $result->execute();           
    }

    public function delete(){

        $query ="DELETE FROM brands WHERE `id_brand` = :id_brand";
        $result = $this->pdo->prepare($query);
        $result->bindValue('id_brand', $this->id_brand, PDO::PARAM_INT);
        $result->execute();
                
    }
}