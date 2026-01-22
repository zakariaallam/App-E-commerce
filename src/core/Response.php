<?php
namespace App\core;
class Response{

public function setStatusCode(int $code){
  http_response_code($code);
}

public function Views(string $name , $data = []){
    $fileName = "src/views/" . $name . ".view.php";
    extract($data);
    if(file_exists($fileName)){
        require_once $fileName;
    }else{
        $fileName = "/src/views/404.view.php";
        require_once $fileName;
    }
}

public function redirect(string $url){
    header("location: $url");
    exit;
}
}