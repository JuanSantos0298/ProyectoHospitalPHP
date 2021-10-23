<?php
    require_once 'controllers/error.php';
    class App{
        function __construct(){
            echo "<p>Nueva app</p>";
            
            $url = $_GET['url'];
            $url = rtrim($url,'/');
            $url = explode('/', $url);

            //var_dump($url);
<<<<<<< HEAD
            if(empty($url[0])){
                $archivoControlador = 'controllers/login.php';
                require_once $archivoControlador;
                $controller = new Login();
                $controller->loadModel('login'); 

                return false;
            }
=======

>>>>>>> parent of efeacd2 (Parte 3/8)
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