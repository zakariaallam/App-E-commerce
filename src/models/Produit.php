<?php
namespace App\models;

use App\models\Categorie;

class Produit{
    private int $id;
    private string $name;
    private string $description;
    private float $price;
    private int $stock;
    private string $image;
    private Categorie $categorie ;
    private string $created_at;

    public function getID(){
        return $this->id;
    }
    public function setID($id){
        $this->id = $id;
        return $this;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
        return $this;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description = $description;
        return $this;
    }
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        $this->price = $price;
        return $this;
    }
    public function getStock(){
        return $this->stock;
    }
    public function setStock($stock){
        $this->stock = $stock;
        return $this;
    }
    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image = $image;
        return $this;
    }
    public function getCategorie(){
        return $this->categorie;
    }
    public function setCategorie($categorie){
        $this->categorie = $categorie;
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