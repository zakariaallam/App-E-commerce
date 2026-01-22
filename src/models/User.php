<?php
namespace App\models;

use App\core\DataBase;
use PDO;

class User {
    private int $id;
    private string $name;
    private string $email;
    private string $password;
    private string $role;
    private bool $is_active;
    private string $created_at;

    public function save(){
        $sql = "INSERT INTO users (name,email,password,role) VALUES (:name,:email,:password,:role)";
        $stmt = DataBase::Connextion()->prepare($sql);
        $stmt->bindParam(":name",$this->name);
        $stmt->bindParam(":email",$this->email);
        $stmt->bindParam(":password",$this->password);
        $stmt->bindParam(":role",$this->role);
        $stmt->execute();
    }

    public function getByEmail(){
        $sql = "SELECT * FROM users WHERE email=:email";
        $stmt = DataBase::Connextion()->prepare($sql);
        $stmt->bindParam(":email",$this->email);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
         return $stmt->fetch();

    }

    public function getId(): int{
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }
    public function getName(): string{
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
        return $this;
    }
    public function getRole(): string{
        return $this->role;
    }

    public function setRole($role){
        $this->role = $role;
        return $this;
    }
    public function getEmail(): string{
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
        return $this;
    }
    public function getPassword(): string{
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
        return $this;
    }
}