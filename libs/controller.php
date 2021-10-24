<?php

    class Controller{

        public $view;
        
        
        function __construct(){
            //echo "<p>Controlador base</p>";
            $this->view = new View();
            $this->userSession = new UserSession();
            
        }

        function loadModel($model){
            $url = 'models/' . $model.'Model.php';
            
            if(file_exists($url)){
                require $url;
                
                $modelName = $model .'Model';
                $this->model = new $modelName;
            }
        }

    }
?>