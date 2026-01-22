<?php
namespace App\repository;

use App\core\DataBase;
use PDO;

class HomeRepository{
    
    public function getProduct(){
        $sql = "SELECT * FROM Products";
        $stmt = DataBase::Connextion()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}