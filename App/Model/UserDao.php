<?php

namespace App\Model;

class UserDao {
    protected $conect;
    
    public function __construct(){
        $this->conect = new \App\Core\connect;
    }
    
    public function save(User $user){
        
        $sql = "INSERT INTO usuarios (name, email, fone, cpf) VALUES (?,?,?,?)";
        $stmt = $this->conect::getConn()->prepare($sql);
        $stmt->bindValue(1,$user->getName());
        $stmt->bindValue(2,$user->getEmail());
        $stmt->bindValue(3,$user->getFone());
        $stmt->bindValue(4,$user->getCPF());

        $res =  $stmt->execute();
        
        $log = new \App\Helper\Log();
        $log->getLogger('User_logger')->info(__METHOD__." - ".($res ? ' Adding a new user' : ' Error saving'), ['id_user'=>$this->conect::getConn()->lastInsertId()]); 
        
        return $res;
    }
    
    public function listUsers(){
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->conect::getConn()->prepare($sql);
        $stmt->execute();
        
        $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        $log = new \App\Helper\Log();
        $log->getLogger('User_logger')->info(__METHOD__. (count($res) > 0 ? " - SUCCESS " : " - ERROR ")." - Listing all users");
        
        return $res;        
    }
    
    public function update(User $user)
    {
        $sql = "UPDATE usuarios SET name=:name, email=:email, fone=:fone, cpf=:cpf WHERE id_user=:id";
        $stmt = $this->conect::getConn()->prepare($sql);

        $res = $stmt->execute([
            'id'    => $user->getId(),
            'name'  => $user->getName(),
            'email'  => $user->getEmail(),
            'fone'  => $user->getFone(),
            'cpf'  => $user->getCPF()
        ]);
        
        $log = new \App\Helper\Log();
        $log->getLogger('User_logger')->info(__METHOD__." - ".($res ? ' Updated user' : ' Error updating user'), ['id_user'=>$user->getId()]); 
        
        return $res;
    }
    
    public function delete($id){
        $sql = "DELETE FROM usuarios WHERE id_user = :id";
        $stmt = $this->conect::getConn()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $res = $stmt->execute();
        
        $log = new \App\Helper\Log();
        $log->getLogger('User_logger')->info(__METHOD__." - ".($res ? ' Delete user' : ' Error when deleting user'), ['id_user'=>$id]); 
        
        return $res;
    }
    
    public function getUserById($id)
    {
        $sql = "SELECT * FROM usuarios WHERE id_user = ?";
        $stmt = $this->conect::getConn()->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();
        
        $res = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        $log = new \App\Helper\Log();
        $log->getLogger('User_logger')->info(__METHOD__. (count($res) > 0 ? " - SUCCESS " : " - ERROR ")." - Listing user", ['id_user' => $id]);
        
        return $res;
    }
}
