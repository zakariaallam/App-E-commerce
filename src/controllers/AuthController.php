<?php
namespace App\controllers;
use App\core\controller;
use App\core\Request;
use App\models\User;

class AuthController extends controller{
    public function Login(){
        if(Request::getMethode() === "POST"){
            $email = Request::post("email");
            $password = Request::post("password");

            $user = new User();
            $data = $user->setEmail($email)
            ->setPassword($password)
            ->getByEmail();

            if(isset($data)){
               session_start();
               $_SESSION['user'] = [
                "id" => $data->getId(),
                "role" => $data->getRole(),
                "name" => $data->getName()
               ];
               header("location: /Home/index");
               return $this->View("Home");
            }

         }
        if(!isset($_SESSION['user_id'])){
          return $this->View("Login",["error" => "Not Sinup"]);
        }
        if(isset($_SESSION['user_id'])){
          return $this->View("Home");
        }
    }

    public function Inscription(){
        if(Request::getMethode() != "POST"){
           $this->View("Inscription");
           return;
        }
        
        $name = Request::post("name");
        $email = Request::post("email");
        $password = Request::post("password");
        $role = Request::post("role");

        $user = new User();
        $user->setName($name)
        ->setEmail($email)
        ->setPassword($password)
        ->setRole($role);
        $user->save();
        header("location: /Auth/Login");
        $this->View("Login", ["success" => "Create success"]);
    }
}