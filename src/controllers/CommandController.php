<?php
namespace App\controllers;

use App\core\Response;

class CommandController{
    private Response $response;

    public function __construct()
    {
        $this->response = new Response();
    }

    public function index(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
       if(!isset($_SESSION['user'])){
           
           $this->response->Views("Login",["error" => "please login"]);
       }
    } 
}