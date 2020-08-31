<?php 

abstract class DbConnect implements Crud {

    protected $pdo;
    protected $id;

    function __construct($id=null) {
        
        $this->id = $id;
    }

    function setId($id){
        $this->id = $id;
    }

    function connect() {
        $this->pdo = new PDO(DATABASE, LOGIN, PASSWD);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //détails de l'erreur
    }

    abstract function insert();
    
    abstract function update();

    abstract function delete();

    abstract function selectAll();
        
    abstract function select();
}