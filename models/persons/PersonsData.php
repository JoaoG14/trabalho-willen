<?php

class PersonsData
{

    private $pdoQuery;

    public function __construct()
    {
        $this->pdoQuery = new PDOQuery;
    }

    public function checkemail($email, $id = null)
    {

        if ($id) {
            $sql = $this->pdoQuery->fetch("SELECT * FROM pessoas WHERE email = :email AND id <> :id", array(
                ':email' => $email,
                ':id' => $id,
            ));
        } else {

            $sql = $this->pdoQuery->fetch("SELECT * FROM pessoas WHERE email = :email", array(
                ':email' => $email,
            ));
        }
        return $sql;
    }

    public function checkcpf($cpf, $id = null)
    {
        if ($id) {
            $sql = $this->pdoQuery->fetch("SELECT * FROM pessoas WHERE cpf = :cpf AND id <> :id", array(
                ':cpf' => $cpf,
                ':id' => $id,
            ));
        } else {
            $sql = $this->pdoQuery->fetch("SELECT * FROM pessoas WHERE cpf = :cpf", array(
                ':cpf' => $cpf,
            ));
        }

        return $sql;
    }

    public function getPersons()
    {

        $sql = $this->pdoQuery->fetchAll("SELECT * FROM pessoas");

        return $sql;
    }

    public function getPerson($id)
    {

        $sql = $this->pdoQuery->fetch("SELECT * FROM pessoas WHERE id = :id", array(
            ':id' => $id
        ));

        return $sql;
    }
}
