<?php
    
    class Login extends Controller{
        
        function __construct(){
            parent::__construct();
            $this->view->render('login/index');
            echo "<p>Constructor Login</p>";
            
        }
        function autenticarUsuario(){
            echo "<p>Verificar usuario - método controlador </p>";
            $this->model->autenticarUsuario();
        }
    }

?>