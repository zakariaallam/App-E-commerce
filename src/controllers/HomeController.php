<?php

namespace App\controllers;

use App\core\Response;
use App\services\HomeService;

class HomeController
{
    private Response $resp;
    private HomeService $produitService;

    public function __construct()
    {
        $this->resp = new Response();
        $this->produitService = new HomeService();
    }
    public function index()
    {
        $data = $this->produitService->getProduit();
         session_start();
        $this->resp->Views("Home", $data);
        // require_once __DIR__ . "/../views/product.view.php";
    }
}
