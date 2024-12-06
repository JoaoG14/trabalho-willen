<?php

class PDOCrud
{

    private $pdo;

    public function __construct($configFile = null)
    {
        $this->pdo = PDOFactory::createPDO($configFile);
    }

    public function insert($table, $columns, $values, array $pdoValues = array())
    {

        $insert = 'INSERT INTO ' . $table . '(' . $columns . ') VALUES (' . $values . ')';
        $stmt   = $this->pdo->prepare($insert);
        $stmt->execute($pdoValues);

        return $this->pdo->lastInsertId();
    }

    public function update($table, $values, $clausule, array $pdoValues = array())
    {
        $update = 'UPDATE ' . $table . ' SET ' . $values . ' ' . $clausule;
        $stmt   = $this->pdo->prepare($update);
        $result = $stmt->execute($pdoValues);

        return $result;
    }

    public function delete($table, $id){

        $delete = 'DELETE FROM ' . $table . ' WHERE ID = '. $id;
        $stmt   = $this->pdo->prepare($delete);
        $result = $stmt->execute(array(
            ':id' => $id,
        ));

        return $result;

    }

    public function deleteMap($table, $column, $id){

        $delete = 'DELETE FROM ' . $table . ' WHERE '.$column.' = '. $id;
        $stmt   = $this->pdo->prepare($delete);
        $result = $stmt->execute(array(
            ':id' => $id,
        ));

        return $result;

    }
}
