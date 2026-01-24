<?php
namespace App\models;
use App\core\DataBase;
use PDO;
class Command{
    private int $id;
    private int $total;
    private string $status;
    private string $created_at;
    private array $listCommandItems;

    public function save(){
        $sql = "INSERT INTO command (total,status) VALUES (:total,:status)";
        $stmt = DataBase::Connextion()->prepare($sql);
        $stmt->bindParam(":total",$this->total);
        $stmt->bindParam(":status",$this->status);
        $stmt->execute();
    }

    public function getByEmail(){
        $sql = "SELECT * FROM command";
        $stmt = DataBase::Connextion()->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
         return $stmt->fetch();
    }

    public function addItems($commad){
        $this->listCommandItems[] = $commad;
    }

    public function getTotalCommand(){
       return  array_reduce(
        $this->listCommandItems,
        fn($sum, $item) => $sum + $item->subTotal(),
        0);
    }
    public function getId(){
        return $this->id;
    }

    public function setId($id){
       $this->id = $id;
       return $this;
    }
    public function getTotal(){
        return $this->total;
    }

    public function setTotal($total){
       $this->total = $total;
       return $this;
    }
    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
       $this->status = $status;
       return $this;
    }
    public function getCreated_at(){
        return $this->created_at;
    }

    public function setCreated_at($created_at){
       $this->created_at = $created_at;
       return $this;
    }
}