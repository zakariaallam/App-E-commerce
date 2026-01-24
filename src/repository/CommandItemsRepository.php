<?php
namespace App\repository;

use App\core\DataBase;
use App\models\Produit;
use PDOException;

class CommandItemsRepository{
    
   public function creatItem($items,$id){
    DataBase::Connextion()->beginTransaction();
    try{
    $sql = "INSERT INTO order_items(order_id,product_id,quantity,price) VALUES (:order_id,:product_id,:quantity,:price)";
    $stmt = DataBase::Connextion()->prepare($sql);
    foreach($items as $item){
        $prd = new Produit();
        $stmt->execute([
            "order_id" => $id,
            "product_id" => $item->getID(),
            "quantity"  => rand(1,100),
            "price"  => $item->getPrice()
        ]);
    }
    DataBase::Connextion()->commit();
    }
    catch(PDOException $e){
       DataBase::Connextion()->rollBack();
       echo $e;
    }
   }
}