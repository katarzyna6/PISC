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

    function insert(){
    
        $query = "INSERT INTO subcategory (name) VALUES(:name)";

        $result = $this->pdo->prepare($query);
        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
       
        $result->execute();

        $this->id = $this->pdo->lastInsertId();
        return $this;
    }

    public function selectAll(){
        $query ="SELECT * FROM subcategory;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas= $result->fetchAll(); //recupérer les données
    
        $tab=[];
    
        foreach($datas as $data) {
            $current = new Subcategory();
            $current->setIdSubcategory($data['id_subcategory']);
            $current->setName($data['name']);
            array_push($tab, $current);
            }
            return $tab;
    
        }
    
        //on récupére les noms des categories
        function select(){
            $query = "SELECT * FROM subcategory WHERE id_subcategory = :id";
            $result = $this->pdo->prepare($query);
            $result->bindValue(':id', $this->id_subcategory, PDO::PARAM_INT);
            $result->execute();
            $datas = $result->fetch();
            $this->name = $datas['name'];
                //appel aux setters de l'objet
            return $this;
        }
    
        public function update(){
            $query ="UPDATE subcategory SET `id_subcategory` = :id_subcategory, `name` = :name";

            $result = $this->pdo->prepare($query);
            $result->bindValue(':id_subcategory', $this->id_subcategory, PDO::PARAM_INT);
            $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        
            $result->execute();
    
            $this->id_subcategory = $this->pdo->lastInsertId();
            return $this; 

        }

        public function delete(){
            $query ="DELETE FROM subcategory WHERE `id_subcategory` = :id_subcategory";
            $result = $this->pdo->prepare($query);
            $result->bindValue('id_subcategory', $this->id_subcategory, PDO::PARAM_INT);
            $result->execute(); 
        }
}