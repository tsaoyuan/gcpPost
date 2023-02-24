<?php
namespace Core;

use PDO;
use PDOException;
class Conn{
    private static $dsn, $user, $pwd;
    private static $instance = null;

    private function __construct(){}
    public static function getInstance()
    {
        self::$dsn = "mysql:host=localhost;dbname=blog";
        self::$user = "luna";
        self::$pwd = "0000";

        if (!self::$instance) {
            try{
                self::$instance = new PDO(self::$dsn, self::$user, self::$pwd);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
            }
        }
        return self::$instance;
    }
}

