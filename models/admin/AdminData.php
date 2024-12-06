<?php 

class AdminData{

    private $pdoQuery;
    private $table;

    public function __construct()
    {   
        $this->pdoQuery = new PDOQuery;
        $this->table = 'admin';
    }

    public function getLogin($login){

        return $this->pdoQuery->fetch("SELECT login FROM admin WHERE login = :login", array(
            ':login' => $login,
        ));

    }

    public function getUser($login){

        return $this->pdoQuery->fetch("SELECT * FROM admin WHERE login = :login", array(
            ':login' => $login,
        ));

    }

}

?>