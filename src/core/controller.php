<?php
namespace App\core;

class controller{
    protected Response $response;

    public function __construct()
    {
        $this->response = new Response();
    }

   public function View($name , $data = []){
      $this->response->Views($name,$data); 
   }
   
}