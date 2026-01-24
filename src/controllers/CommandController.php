<?php
namespace App\controllers;

use App\core\Response;
use App\services\CommandService;

class CommandController{
    private Response $response;
    private CommandService $commandService;

    public function __construct()
    {
        $this->response = new Response();
        $this->commandService = new CommandService();
    }

    public function index(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
       if(!isset($_SESSION['user'])){
           
           header("location: /Auth/Login");
           return;
       }

       $result = $this->commandService->saveCommand();
       if($result == "seccess"){
        // echo "<script>alert('success')</script>";
        header("location: /Cart/index");
       }
    } 
}