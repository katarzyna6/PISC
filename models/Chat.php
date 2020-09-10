<?php

class Chat extends DbConnect {
    
    private $id_chat;
    private $pseudo;
    private $message;
    private $id_admin;

    function __construct($id = null) {
        parent::__construct($id);
    }

    
    public function getIdChat () {    
        return $this->id_chat;
    }

    public function setIdChat($id_chat) {
        $this->id_chat = $id_chat;
    }

    public function getPseudo () {    
        return $this->pseudo;
    }

    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    public function getMessage () {    
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function getIdAdmin () {    
        return $this->id_admin;
    }

    public function setIdAdmin($id_admin) {
        $this->id_admin = $id_admin;
    }
}