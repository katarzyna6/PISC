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
    private $id_admin;
    // private $id_image;

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

    public function getIdCategory () {    
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

    public function getIdAdmin () {    
        return $this->id_admin;
    }
    
    public function setIdAdmin($id_admin) {
        $this->id_admin = $id_admin;
    }

    function insert(){
        var_dump($this);
        $this->connect();
    
        $query = "INSERT INTO items (name, description, price, avis, note, id_category, id_subcategory, id_brand, id_admin)
        VALUES(:name, :description, :price, :avis, :note, :id_category, :id_subcategory, :id_brand, :id_admin)";

        $result = $this->pdo->prepare($query);
        
        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        $result->bindValue(':description', $this->description, PDO::PARAM_STR);
        $result->bindValue(':price', $this->price, PDO::PARAM_STR);
        $result->bindValue(':avis', $this->avis, PDO::PARAM_STR);
        $result->bindValue(':note', $this->note, PDO::PARAM_INT);
        $result->bindValue(':id_brand', $this->id_brand, PDO::PARAM_INT);
        $result->bindValue(':id_category', $this->id_category, PDO::PARAM_INT);
        $result->bindValue(':id_subcategory', $this->id_subcategory, PDO::PARAM_INT);
        $result->bindValue(':id_admin', $this->id_admin, PDO::PARAM_INT);
        $success = $result->execute();
            // if(!$success) {
            //     var_dump($this->pdo->errorInfo());
            // }

        $this->id_item = $this->pdo->lastInsertId();
        
        var_dump($this);
        return $this;
    }

    public function select(){
        $this->connect();
        $query = "SELECT * FROM items WHERE id_item = :id";
        $result = $this->pdo->prepare($query);
        $result->bindValue('id', $this->id_item, PDO::PARAM_INT);
        $result->execute();
        $datas = $result->fetch();
        
        $this->setIdItem($datas['id_item']);
        $this->setName($datas['name']);
        $this->setDescription($datas['description']);
        $this->setPrice($datas['price']);
        $this->setAvis($datas['avis']);
        $this->setNote($datas['note']);
        $this->setIdBrand($datas['id_brand']);
        $this->setIdCategory($datas['id_category']);
        $this->setIdSubcategory($datas['id_subcategory']);
        $this->setIdAdmin($datas['id_admin']);

        return $this;
    }

    public function selectAll(){
        $this->connect();
        $query ="SELECT * FROM items;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas= $result->fetchAll(); 

        $tab=[];

        foreach($datas as $data) {
            $current = new Item();
            $current->setIdItem($data['id_item']);
            $current->setName($data['name']);
            $current->setDescription($data['description']);
            $current->setPrice($data['price']);
            $current->setAvis($data['avis']);
            $current->setNote($data['note']);
            $current->setIdBrand($data['id_brand']);
            $current->setIdCategory($data['id_category']);
            $current->setIdSubcategory($data['id_subcategory']);
            $current->setIdAdmin($data['id_admin']);   
            array_push($tab, $current);
            }
            return $tab;
    }

    public function selectByAdmin() {

        $this->connect();
        $query = "SELECT id_item, name, description, price, avis, note, id_brand, id_category, id_subcategory, id_admin FROM items WHERE id_admin = :id";
        $result = $this->pdo->prepare($query);
        // var_dump($this->id_admin);
        $result->bindValue("id", $this->id_admin, PDO::PARAM_INT);
        $result->execute();
        $datas = $result->fetchAll();
        // var_dump($datas);
        $items = [];
        foreach($datas as $elem) {
        $item = new Item();
        $item->setIdItem($elem['id_item']);
        $item->setIdAdmin($elem['id_admin']);
        $item->setName($elem['name']);
        $item->setDescription($elem['description']);
        $item->setPrice($elem['price']);
        $item->setAvis($elem['avis']);
        $item->setNote($elem['note']);
        $item->setIdBrand($elem['id_brand']);
        $item->setIdCategory($elem['id_category']);
        $item->setIdSubcategory($elem['id_subcategory']);
        
        array_push($items, $item);
        }

        return $items; 
    }

    public function selectByBrand() {
        $this->connect();
        $query = "SELECT id_item, name, description, price, avis, note, id_brand, id_category, id_subcategory, id_admin FROM items WHERE id_brand = :id";
        $result = $this->pdo->prepare($query);

        $result->bindValue("id", $this->id_brand, PDO::PARAM_INT);
        $result->execute();
        $datas = $result->fetchAll();

        $items = [];
        foreach($datas as $elem) {
        $item = new Item();
        $item->setIdItem($elem['id_item']);
        $item->setIdAdmin($elem['id_admin']);
        $item->setName($elem['name']);
        $item->setDescription($elem['description']);
        $item->setPrice($elem['price']);
        $item->setAvis($elem['avis']);
        $item->setNote($elem['note']);
        $item->setIdBrand($elem['id_brand']);
        $item->setIdCategory($elem['id_category']);
        $item->setIdSubcategory($elem['id_subcategory']);
        
        array_push($items, $item);
        }

        return $items; 
    }

    public function selectByCategory() {
        $this->connect();
        $query = "SELECT id_item, name, description, price, avis, note, id_brand, id_category, id_subcategory, id_admin FROM items WHERE id_category = :id";
        $result = $this->pdo->prepare($query);

        $result->bindValue("id", $this->id_category, PDO::PARAM_INT);
        $result->execute();
        $datas = $result->fetchAll();

        $items = [];
        foreach($datas as $elem) {
        $item = new Item();
        $item->setIdItem($elem['id_item']);
        $item->setIdAdmin($elem['id_admin']);
        $item->setName($elem['name']);
        $item->setDescription($elem['description']);
        $item->setPrice($elem['price']);
        $item->setAvis($elem['avis']);
        $item->setNote($elem['note']);
        $item->setIdBrand($elem['id_brand']);
        $item->setIdCategory($elem['id_category']);
        $item->setIdSubcategory($elem['id_subcategory']);
        
        array_push($items, $item);
        }

        return $items; 
    }

    public function selectBySubcategory() {
        $this->connect();
        $query = "SELECT id_item, name, description, price, avis, note, id_brand, id_category, id_subcategory, id_admin FROM items WHERE id_subcategory = :id";
        $result = $this->pdo->prepare($query);

        $result->bindValue("id", $this->id_subcategory, PDO::PARAM_INT);
        $result->execute();
        $datas = $result->fetchAll();

        $items = [];
        foreach($datas as $elem) {
        $item = new Item();
        $item->setIdItem($elem['id_item']);
        $item->setIdAdmin($elem['id_admin']);
        $item->setName($elem['name']);
        $item->setDescription($elem['description']);
        $item->setPrice($elem['price']);
        $item->setAvis($elem['avis']);
        $item->setNote($elem['note']);
        $item->setIdBrand($elem['id_brand']);
        $item->setIdCategory($elem['id_category']);
        $item->setIdSubcategory($elem['id_subcategory']);
        
        array_push($items, $item);
        }

        return $items; 
    }

    public function selectByLastId() {

        $this->connect();
        $query = "SELECT * FROM `items` ORDER BY id_item DESC LIMIT 4";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas = $result->fetchAll();
        $items = [];
        foreach($datas as $elem) {
        $item = new Item();
        $item->setIdItem($elem['id_item']);
        $item->setName($elem['name']);
        $item->setPrice($elem['price']);
        $item->setDescription($elem['description']);
        array_push($items, $item);
        }

        return $items; 
    }

    public function selectByNote() {

        $this->connect();
        $query = "SELECT * FROM `items` ORDER BY note DESC LIMIT 4";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas = $result->fetchAll();
        $items = [];
        foreach($datas as $elem) {
        $item = new Item();
        $item->setNote($elem['note']);
        $item->setIdItem($elem['id_item']);
        $item->setName($elem['name']);
        $item->setPrice($elem['price']);
        
        array_push($items, $item);
        }

        return $items; 
    }

    public function update(){
        $this->connect();

        $query ="UPDATE items SET `name`= :name, `description`= :description, `price`= :price, `avis`= :avis, `note`= :note, `id_category`= :id_category, `id_subcategory`= :id_subcategory, `id_brand`= :id_brand, `id_admin` = :id_admin WHERE `id_item`= :id_item";

        $result = $this->pdo->prepare($query);
        $result->bindValue(':id_item', $this->id_item, PDO::PARAM_INT);
        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        $result->bindValue(':description', $this->description, PDO::PARAM_STR);
        $result->bindValue(':price', $this->price, PDO::PARAM_STR);
        $result->bindValue(':avis', $this->avis, PDO::PARAM_STR);
        $result->bindValue(':note', $this->note, PDO::PARAM_STR);
        $result->bindValue(':id_category', $this->id_category, PDO::PARAM_INT);
        $result->bindValue(':id_subcategory', $this->id_subcategory, PDO::PARAM_INT);
        $result->bindValue(':id_brand', $this->id_brand, PDO::PARAM_INT);
        $result->bindValue(':id_admin', $this->id_admin, PDO::PARAM_INT);
        $result->execute();
        
    }

    public function delete(){
        $this->connect();
        var_dump($this->id_item);
        $query ="DELETE FROM items WHERE `id_item` = :id_item";
        $result = $this->pdo->prepare($query);
        $result->bindValue('id_item', $this->id_item, PDO::PARAM_INT);
        $result->execute();           
    }
}