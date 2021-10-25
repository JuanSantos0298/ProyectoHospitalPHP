<?php

    class Login extends Controller{

        function __construct(){
            parent::__construct();
            error_log('ControladorLogin::construct -> Controlador login iniciado');
        }

        function render(){
            error_log('ControladorLogin::render -> Cargando el index de login');
            $this->view->render('login/index');
        }
        
    }
    
?>