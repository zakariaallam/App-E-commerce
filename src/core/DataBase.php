<?php
namespace App\core;
use PDO;
use PDOException;
class DataBase{
    private static ?PDO $pdo = NULL;

   
    public static function Connextion(){
        if(self::$pdo == NULL){
            $host = getenv("PGHOST") ?: "dpg-d5qhb2v5r7bs738l1v7g-a";
            $database = getenv("PGDATABASE") ?: "ecommerce_ghyj";
            $user = getenv("PGUSER") ?: "root";
            $pass = getenv("PGPASSWORD") ?: "VbjINJZJYv650S6pFT5PzIqXmuLyqAQu";
            $port = getenv("PGPORT") ?: 5432;
            try{
            self::$pdo = new PDO("pgsql:host=".$host.";port=".$port.";dbname=".$database,$user,$pass);
            }
            catch(PDOException $e){
                die("❌ Database connection failed: " . $e->getMessage());
            }
        }
        
        return self::$pdo;
    } 
}