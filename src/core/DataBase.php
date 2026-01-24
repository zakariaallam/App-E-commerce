<?php
namespace App\core;
use PDO;
use PDOException;
class DataBase{
    private static ?PDO $pdo = NULL;

    public static function Connextion(){
        if(self::$pdo == NULL){
            $host = getenv("PGHOST") ?: "postgres";
            $database = getenv("PGDATABASE") ?: "ecommerce";
            $user = getenv("PGUSER") ?: "root";
            $pass = getenv("PGPASSWORD") ?: "root123";
            $port = getenv("PGPORT") ?: 5432;
            try{
            self::$pdo = new PDO("pgsql:host=".$host.";port=".$port.";dbname=".$database,$user,$pass);
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        
        return self::$pdo;
    } 
}