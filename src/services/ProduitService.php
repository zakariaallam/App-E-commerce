<?php
namespace App\services;

use App\models\Categorie;
use App\models\Produit;
use App\repository\ProduitRepository;

class ProduitService{
   private ProduitRepository $produitRepo;
   
   public function __construct()
   {
    $this->produitRepo = new ProduitRepository();
   }

   public function getProduit($id){
      $row = $this->produitRepo->getProductByID($id);
      $produit = new Produit();
      $produit->setID($row['produit_id'])
      ->setName($row['name'])
      ->setDescription($row['description'])
      ->setImage($row['image'])
      ->setPrice($row['price'])
      ->setStock($row['stock'])
      ->setCreated_at($row['created_at'])
      ->setCategorie(new Categorie())
      ->getCategorie()
      ->setId($row['category_id'])
      ->setName($row['category_name']);

      return ["produit" => $produit];
   }
}