<?php
namespace App\repository;

use App\core\DataBase;

class CommandRepository{
    
    public function creatCommmand($id,$total){
        $sql = "INSERT INTO orders(total,user_id) VALUES(:total,:user_id)";
        $stmt = DataBase::Connextion()->prepare($sql);
        $stmt->bindParam(":total",$total);
        $stmt->bindParam(":user_id",$id);
        $stmt->execute();
        return DataBase::Connextion()->lastInsertId();
    }
}