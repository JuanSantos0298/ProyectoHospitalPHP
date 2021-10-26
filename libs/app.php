<?php

    require_once 'controllers/errores.php';
    class App{
        function __construct(){
            $url = isset($_GET['url']) ? $_GET['url'] : null;
            $url = rtrim($url,'/');
            $url = explode('/',$url); 
            
            if(empty($url[0])){
                error_log('App::construct - > No hay controlador especificado');
                $archivoControlador = 'controllers/login.php';
                require_once $archivoControlador;
                $controlador = new Login();
                $controlador->loadModel('login');
                $controlador->render();
                return false;
            }
            $archivoControlador = 'controllers/' . $url[0] . '.php';
            if(file_exists($archivoControlador)){
                require_once $archivoControlador;
                $controlador = new $url[0];
                $controlador->loadModel($url[0]);
                
                if(isset($url[1])){
                    if(method_exists($controlador,$url[1])){
                        if(isset($url[2])){
                            //Método con parametros
                            $nparam = count($url) - 2;
                            $parametros = [];

                            for($i = 0; $i<$nparam; $i++){
                                array_push($parametros,$url[$i] + 2);
                            }
                            
                            $controlador->{$url[1]}($parametros);
                        }else{
                            //Metodo sin parametros
                            $controlador->{$url[1]}();
                        }    
                    }else{
                        //No existe el método
                        $controlador = new Errores();
                        
                    }
                }else{
                    //No se llama nigun método, se carga el método por default
                    $controlador->render();
                }

            }else{
                //no existe, manda error
                $controlador = new Errores();
                $controlador->render();
            }
        }
    }
?>