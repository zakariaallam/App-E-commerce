<?php
namespace App\repository;
use App\core\DataBase;
use App\models\Produit;
use PDO;
class ProduitRepository{

    // public function save(){
    //     $sql = "INSERT INTO Produit (total,status) VALUES (:total,:status)";
    //     $stmt = DataBase::Connextion()->prepare($sql);
    //     $stmt->bindParam(":total",$this->total);
    //     $stmt->bindParam(":status",$this->status);
    //     $stmt->execute();
    // }

    public function getProductByID($id){
        $sql = "SELECT  p.id AS produit_id, 
            p.name, 
            p.description, 
            p.price, 
            p.stock, 
            p.image, 
            p.created_at,
            c.id AS category_id, 
            c.name AS category_name FROM products p JOIN categories c ON c.id = p.category_id  WHERE p.id = :id";
        $stmt = DataBase::Connextion()->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
         return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}