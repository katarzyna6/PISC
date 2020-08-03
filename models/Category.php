<?php

class Category extends DbConnect {

    protected $id_category; 
    protected $name; 
    
    function __construct($id=null) {
        parent::__construct($id);
    }

    public function getIdCategory() {
        return $this->id_category;
    }

    public function setIdCategory(int $id_category) {
        $this->id_category = $id_category;
    }

    public function getName() {
        return $this->name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }


    function insert(){
    
        $query = "INSERT INTO category (name) VALUES(:name)";

        $result = $this->pdo->prepare($query);
        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        $result->execute();

        $this->id = $this->pdo->lastInsertId();
        return $this;
    }

    public function selectAll(){
        $query ="SELECT * FROM category;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas= $result->fetchAll(); //recupérer les données
    
        $tab=[];
    
        foreach($datas as $data) {
            $current = new Category();
            $current->setIdCategory($data['id_category']);
            $current->setName($data['name']);
            array_push($tab, $current);
            }
            return $tab;
    
        }
    
        //on récupére les noms des categories
        function select(){
            $query = "SELECT * FROM category WHERE id_category = :id";
            $result = $this->pdo->prepare($query);
            $result->bindValue(':id', $this->id_category, PDO::PARAM_INT);
            $result->execute();
            $datas = $result->fetch();
            $this->name = $datas['name'];
                //appel aux setters de l'objet
            return $this;
        }
    
        public function update(){
            
            $query ="UPDATE category SET `id_category` = :id_category, `name` = :name";

            $result = $this->pdo->prepare($query);
            $result->bindValue(':id_category', $this->id_category, PDO::PARAM_INT);
            $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        
            $result->execute();

            $this->id_category = $this->pdo->lastInsertId();
            return $this; 
        }

        public function delete(){

            $query ="DELETE FROM category WHERE `id_category` = :id_category";
            $result = $this->pdo->prepare($query);
            $result->bindValue('id_category', $this->id_category, PDO::PARAM_INT);
            $result->execute();           
    
        }


}