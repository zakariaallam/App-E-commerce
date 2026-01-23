<?php
namespace App\core;
use App\core\Request;

class Router {
  private Request $request;

  public function __construct()
  {
    $this->request = new Request();
  }
  public function disparcher(){
    $uri = $this->request->getUri();
    $respons = $this->resolve($uri);
    $aplec = $this->execute($respons);
    return $aplec;
  }

  public function resolve($uri){
     $posission = strpos($uri,"?");
     if($posission == false){
         $arrayAction = explode("/",$uri);
         if(count($arrayAction)< 3 ){
           return [
             "controller" => "Home",
             "methode" => "index"
             ];
         }
         return [
             "controller" => $arrayAction[1],
             "methode" => $arrayAction[2]
             ];
    }
    $cleanUri = str_split($uri,$posission);
     $arrayAction = explode("/",$cleanUri[0]);

     return [
        "controller" => $arrayAction[1],
        "methode" => $arrayAction[2]
     ];
  }

  public function execute($respons){
      $url = "App\controllers\\" . $respons['controller'] . "Controller";

      $instense = new $url();
      return $instense->{$respons['methode']}();
  }

}