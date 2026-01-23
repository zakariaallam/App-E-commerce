<?php

namespace App\controllers;

use App\core\Response;
use App\services\ProduitService;

class ProductController{
    private Response $resp;
    private ProduitService $produitService;

    public function __construct()
    {
        $this->resp = new Response();
        $this->produitService = new ProduitService();
    }
    public function index(){
        $id = $_GET['id'];
        $data = $this->produitService->getProduit($id);
        $this->resp->Views("Product",$data);
    }

     public function sendCart(){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
         $id = $_GET['id'];
        $message = $this->produitService->sendCart($id);
        header("location: /Product/index?id=$id");
        echo "<script>alert('$message');</script>";
        // require_once __DIR__ . "/../views/Cart.view.php";
    }

}