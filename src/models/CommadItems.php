<?php
namespace App\models;

class CommadItems{
    private int $id;
    private Command $command;
    private Produit $produit;
    private int $quantiy;
    private float $price;


    public function subTotal(){
        return $this->quantiy * $this->price;
    }

    public function getID(){
        return $this->id;
    }

    public function setID($id){
      $this->id = $id;
      return $this;
    }
    public function getQuantiy(){
        return $this->quantiy;
    }

    public function setQuantiy($quantiy){
      $this->quantiy = $quantiy;
      return $this;
    }
    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
      $this->price = $price;
      return $this;
    }
}