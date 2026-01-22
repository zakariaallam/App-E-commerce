<?php
namespace App\core;
class Request{

  public function getUri(){
    return $_SERVER['REQUEST_URI'];
  }

  public static function getMethode(){
     return $_SERVER['REQUEST_METHOD'];
  }

  public function get($key = null){
    if($key){
        return $_GET[$key];
    }
  }

  public static function post($key = null){
    if($key){
        return $_POST[$key];
    }
  }

}