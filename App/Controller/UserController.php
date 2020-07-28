<?php

namespace App\Controller;

class UserController {
    
    public function cadastro($id = null)
    {
        $id = (int)$id[0];
        if(isset($id) && !empty($id)){
            $userDao = new \App\Model\UserDao();
            $user = $userDao->getUserById($id);
        }
        include 'App/views/cadastro.php';
    }
    
    public function save()
    {
        $result['status'] = TRUE;
        $result['acao'] = filter_input(INPUT_POST, 'save_submit');
        $helper = new \App\Helper\Helper();
        $vars = [
            'name'  => FILTER_SANITIZE_STRING,
            'email' => FILTER_SANITIZE_EMAIL,
            'fone'  => FILTER_SANITIZE_STRING,
            'cpf'   => FILTER_SANITIZE_STRING,
        ];
        if($result['acao'] === 'Atualizar'){
            $vars['id_user'] = FILTER_SANITIZE_STRING;
        }
        
        $dados = filter_input_array(INPUT_POST, $vars);

        if(!$helper::validaCPF($dados['cpf']) || !$helper::validaEmail($dados['email'])){
            $result['status'] = FALSE;
        } else {
            $userDao = new \App\Model\UserDao();
            $user = new \App\Model\User();
            
            $user->setName($dados['name']);
            $user->setEmail($dados['email']);
            $user->setFone($dados['fone']);
            $user->setCPF($dados['cpf']);
            
            if($result['acao'] === 'Atualizar'){
                $user->setId((int)$dados['id_user']);
                $result['status'] = $userDao->update($user);
            }else{
                $result['status'] = $userDao->save($user);
            }
        }        
        
        extract($result);
        include 'App/views/result.php';
    }
    
    public function lista()
    {
        $userDao = new \App\Model\UserDao();
        $users = $userDao->listUsers();
        include 'App/views/listUsers.php';
    }
    
    public function update($user)
    {
        $result['status'] = false;
        $result['update'] = 'save';
    }
    
    public function delete()
    {
        $id = filter_input(INPUT_POST, 'id');
        
        if(isset($id) && !empty($id)){
            $userDao = new \App\Model\UserDao();
            $status = $userDao->delete($id);
        }
        echo json_encode($status);
    }
    
}
