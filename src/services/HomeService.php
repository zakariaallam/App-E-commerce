<?php
namespace App\services;

use App\models\Categorie;
use App\repository\HomeRepository;
use App\models\Produit;

class HomeService{
    private HomeRepository $produitRepo;
        
    public function __construct()
    {
            $this->produitRepo = new HomeRepository();
            
    }

   public function getProduit(){
      $rows = $this->produitRepo->getProduct();
      if(!$rows){
        return false;
      }

      $produits = [];
      foreach($rows as $row){
        $produit = new Produit();
          $produit
      ->setID($row['id'])
      ->setDescription($row['description'])
      ->setName($row['name'])
      ->setPrice($row['price'])
      ->setStock($row['stock'])
      ->setImage($row['image'])
      ->setCreated_at($row['created_at'])
      ->setCategorie((new Categorie()))
      ->getCategorie()->setId($row['id']);
      $produits[] = $produit;
      }
      

      return $produits;
   }

}