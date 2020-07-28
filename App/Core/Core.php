<?php

namespace App\Core; 

class Core {
    public function run()
    {
        $params = [];
        $uri = $_SERVER['REQUEST_URI'];
        $uri = explode('/',$uri);
        array_shift($uri);
        $controller = isset($uri[0]) && !empty($uri[0]) ? $uri[0].'Controller' : 'HomeController';
        array_shift($uri);
        
        $action = isset($uri[0]) && !empty($uri[0]) ? $uri[0] : 'index';
        array_shift($uri);
        
        while (count($uri) > 0){
            array_push($params, $uri);
            array_shift($uri);
        }   
        
        $objectName = '\\App\\Controller\\'.ucfirst($controller);

        $c = new $objectName;
        //$arrData = json_decode(file_get_contents("php://input"), true);

//        if($arrData){
//            $result = $c->$action($arrData);
//            echo json_encode($result);
//        } else {
            call_user_func_array(array($c, $action), $params);
//        }
        
    }
}
