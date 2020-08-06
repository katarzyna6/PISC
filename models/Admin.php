<?php

class Admin extends DbConnect {
    
    private $id_admin;
    private $nick;
    private $email;
    private $password;

    function __construct($id = null) {
        parent::__construct($id);
    }

    
    public function getIdAdmin () {    
        return $this->id_admin;
    }
    
    public function setIdAdmin($id_admin) {
        $this->id_admin = $id_admin;
    }

    public function getNick() {
        return $this->nick;
    }
    
    public function setNick(string $nick) {
        $this->nick = $nick;
    }

    public function getEmail() {
        return $this->email;
    }
    
    public function setEmail(string $email) {
        $this->email = $email;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function setPassword(string $password) {
        $this->password = $password;
    }
    
    function insert(){
    
        $query = "INSERT INTO admins (nick, email, password)
            VALUES(:nick, :email, :password)";

        $result = $this->pdo->prepare($query);
        $result->bindValue(':nick', $this->nick, PDO::PARAM_STR);
        $result->bindValue(':email', $this->email, PDO::PARAM_STR);
        $result->bindValue(':password', $this->password, PDO::PARAM_STR);
        $result->execute();

        $this->id = $this->pdo->lastInsertId();
        return $this;
        
    }

    function update(){
        $query ="UPDATE admins SET `nick` = :nick , `email` = :email, `password` = :password WHERE `id_admin` = :id_admin";

    $result = $this->pdo->prepare($query);
    $result->bindValue(':id_admin', $this->id_admin, PDO::PARAM_INT);
    $result->bindValue(':nick', $this->nick, PDO::PARAM_STR);
    $result->bindValue(':email', $this->email, PDO::PARAM_STR);
    $result->bindValue(':password', $this->password, PDO::PARAM_STR);
    $result->execute();

    $this->id = $this->pdo->lastInsertId();
    return $this;
    }

    function delete(){
        $query ="DELETE * FROM admins WHERE nick=:nick";
        $result = $this->pdo->prepare($query);
        $result->bindValue(':nick', $this->nick, PDO::PARAM_STR);
        $result->execute();
        $data = $result->fetch();
        return $this;
    }
       
    function select(){
        $query = "SELECT * FROM admins WHERE id_admin = :id_admin";
        $result = $this->pdo->prepare($query);
        $result->bindValue(':id_admin', $this->id_admin, PDO::PARAM_INT);
        $result->execute();
        $data = $result->fetch();
        return $this;
    }

    public function selectByNick() {
        $query = "SELECT * FROM admins WHERE nick = :nick";
        $result = $this->pdo->prepare($query);
        $result->bindValue(':nick', $this->nick, PDO::PARAM_STR);
        $result->execute();
        $data = $result->fetch();
         return $data;
        }

    function selectAll() {
        $query = "SELECT * FROM admins;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas = $result->fetchAll();
        $tab = [];

        foreach($datas as $data) {
            $current = new Admin();
            $current->setIdAdmin($data['id_admin']);
            array_push($tab, $current);
            }
            return $tab;
    }
}
    