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

}