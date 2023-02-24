<?php
namespace Core;

use PDOException;
class Database{
    private $db;
    private $statement;
    public function __construct()
    {
        $this->db = Conn::getInstance();
    }

    public function query($sql, $params = []){

        try{
            $this->statement = $this->db->prepare($sql);
            $this->statement->execute($params);
            // return $statement;
            return $this;
            
        }catch(PDOException $e){
            $errorMessage = $e->getCode();
            // SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry 
            if ($errorMessage === "23000") {
                $_SESSION["sqlMessage"] = "該使用者已存在！";
                // dumpDie($_SESSION);
            } else {
                echo $e->getMessage();
            }
        }
    }

    public function find(){
        return $this->statement->fetch();
    }

    public function get(){
        return $this->statement->fetchAll();
    }

    public function findOrFail(){
        $result = $this->find();

        if (!$result) {
            abort();
        }

        return $result;
    }
}