<?php

class Categorie extends DbConnect {

    protected $id_category; 
    protected $name; 
    
    function __construct($id=null) {
        parent::__construct($id);
    }

    public function getIdCategory() {
        return $this->id_category;
    }

    public function setIdCategory(int $id_category) {
        $this->idCategorie = $id_category;
    }

    public function getName() {
        return $this->name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }


//     function insert(){
    
//         $query = "INSERT INTO categories (nom) VALUES(:nom)";

//         $result = $this->pdo->prepare($query);
//         $result->bindValue(':nom', $this->nom, PDO::PARAM_STR);
       
//         $result->execute();

//         $this->id = $this->pdo->lastInsertId();
//         return $this;
//     }

//     public function selectAll(){
//         $query ="SELECT * FROM categories;";
//         $result = $this->pdo->prepare($query);
//         $result->execute();
//         $datas= $result->fetchAll(); //recupérer les données
    
//         $tab=[];
    
//         foreach($datas as $data) {
//             $current = new Categorie();
//             $current->setIdCategorie($data['id_categorie']);
//             $current->setNom($data['nom']);
//             array_push($tab, $current);
//             }
//             return $tab;
    
//         }
    
//         //on récupére les noms des categories
//         function select(){
//             $query = "SELECT * FROM categories WHERE id_categorie = :id";
//             $result = $this->pdo->prepare($query);
//             $result->bindValue(':id', $this->idCategorie, PDO::PARAM_INT);
//             $result->execute();
//             $datas = $result->fetch();
//             $this->nom = $datas['nom'];
//                 //appel aux setters de l'objet
//             return $this;
//         }
    
//         public function update(){}
//         public function delete(){}
// 

}