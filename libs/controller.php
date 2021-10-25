<?php
    //Controlador base
    class Controller{
        
        function __construct(){
            $this->view = new View();
        }
        
        function loadModel($model){
            $url = 'models/' . $model . 'model.php';
            
            if(file_exists($url)){
                require_once $url;
                
                $modelName = $model . 'Model';
                $this->model = new $modelName();
            }
        }

        function existPOST($parametros){
            foreach($parametros as $parametro){
                if(!isset($_POST[$parametro])){
                    error_log('Controller::existPOST -> No existe el parametro ' . $parametro);
                    return false;
                }
            }
            return true;
        }

        function existGET($parametros){
            foreach($parametros as $parametro){
                if(!isset($_GET[$parametro])){
                    error_log('Controller::existGET -> No existe el parametro ' . $parametro);
                    return false;
                }
            }
            return true;
        }

        function getGET($name){
            return $_GET[$name];
        }

        function getPOST($name){
            return $_POST[$name];
        }

        function redirect($url, $mensajes){
            $data = [];
            $params = '';
            
            foreach ($mensajes as $key => $value) {
                array_push($data, $key . '=' . $value);
            }
            $params = join('&', $data);
            
            if($params != ''){
                $params = '?' . $params;
            }
            header('location: ' . constant('URL') . $url . $params);
    
        }
        
    }

?>