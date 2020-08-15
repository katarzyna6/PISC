<?php

class Link extends DbConnect {
    
    private $id_link;
    private $name;
    private $url;
    private $id_admin;

    function __construct($id = null) {
        parent::__construct($id);
    }

    
    public function getIdLink () {    
        return $this->id_link;
    }
    
    public function setIdLink($id_link) {
        $this->id_link = $id_link;
    }

    public function getName () {    
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }

    public function getUrl () {    
        return $this->url;
    }
    
    public function setUrl($url) {
        $this->url = $url;
    }

    public function getIdAdmin () {    
        return $this->id_admin;
    }
    
    public function setIdAdmin($id_admin) {
        $this->id_admin = $id_admin;
    }

    function insert(){
    
        $query = "INSERT INTO links (name, url, id_admin) VALUES(:name, :url, :id_admin)";

        $result = $this->pdo->prepare($query);
        $result->bindValue(':id_link', $this->id_link, PDO::PARAM_INT);
        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        $result->bindValue(':url', $this->url, PDO::PARAM_STR);
        $result->bindValue(':id_admin', $this->id_admin, PDO::PARAM_INT);
        $result->execute();

        $this->id_link = $this->pdo->lastInsertId();
        
        var_dump($this);
        return $this;
    }

    public function select(){

        $query = "SELECT * FROM links WHERE id_link = :id";
        $result = $this->pdo->prepare($query);
        $result->bindValue('id', $this->id_link, PDO::PARAM_INT);
        $result->execute();
        $datas = $result->fetch();
        
        $this->setIdLink($datas['id_link']);
        $this->setName($datas['name']);
        $this->setUrl($datas['url']);
        $this->setIdAdmin($datas['id_admin']);

        return $this;
    }

    public function selectAll(){
        
        $query ="SELECT * FROM links;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas= $result->fetchAll(); 

        $tab=[];

        foreach($datas as $data) {
            $current = new Link();
            $current->setIdLink($data['id_link']);
            array_push($tab, $current);
            }
            return $tab;
    }

    public function update(){
        
        $query ="UPDATE links SET `name`= :name, `url` = :url WHERE `id_link` = :id_link";
        $result = $this->pdo->prepare($query);
        
        $result->bindValue('name', $this->name, PDO::PARAM_STR);
        $result->bindValue('url', $this->description, PDO::PARAM_STR);
        $result->bindValue('id_link', $this->id_link, PDO::PARAM_INT);
        $result->execute();           
    }

    public function delete(){

        $query ="DELETE FROM links WHERE `id_link` = :id_link";
        $result = $this->pdo->prepare($query);
        $result->bindValue('id_link', $this->id_link, PDO::PARAM_INT);
        $result->execute();
                
    }
}