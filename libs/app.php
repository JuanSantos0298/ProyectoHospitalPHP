<?php
    require_once 'controllers/error404.php';

    class App{
        
        function __construct(){
            //echo "<p>Nueva app</p>";

            /* OBTENER Y RECORTAR URL URL/CONTROLADOR/METODO */
            $url = isset($_GET['url']) ? $_GET['url'] : null;
            $url = rtrim($url, '/');
            $url = explode('/',$url);

            //var_dump($url);
            if(empty($url[0])){
                $archivoControlador = 'controllers/login.php';
                require_once $archivoControlador;
                $controller = new Login(); 
                $controller->loadModel('login');
                return false;
            }
            
            $archivoControlador = 'controllers/' . $url[0] . '.php';
            
            if(file_exists($archivoControlador)){
                require_once $archivoControlador;
                $controller = new $url[0];
                $controller->loadModel($url[0]);
                
                if(isset($url[1])){
                    $controller->{$url[1]}();
                }
            }else{
                $controller = new Error404();
            }
        }
    }

?>