<?php
namespace App\controllers;
class CartController{

    public function index(){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        
        // var_dump($_SESSION);
        require_once __DIR__ . "/../views/Cart.view.php";
    }
}