<?php

namespace App\Model;

class User {
    private $id;
    private $name;
    private $email;
    private $fone;
    private $cpf;
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function setName($name){
        $this->name = $name;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }
    
    public function getFone(){
        return $this->fone;
    }
    
    public function setFone($fone){
        $this->fone = $fone;
    }
    
    public function getCPF(){
        return $this->cpf;
    }
    
    public function setCPF($cpf){
        $this->cpf = $cpf;
    }
}
