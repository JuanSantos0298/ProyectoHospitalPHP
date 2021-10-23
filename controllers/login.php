<?php

    class Login extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->visualizar('login/index');
            echo "<p>Nuevo controlador login</p>";
        }
       
        function validarUsuario(){
            echo "<p>Se validaron los datos</p>";
            $this->model->verificarUsuario();
        }
    }
    
?>