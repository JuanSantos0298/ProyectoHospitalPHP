<?php

    class Login extends SessionController{

        function __construct(){
            parent::__construct();
            error_log('ControladorLogin::construct -> Controlador login iniciado');
        }
        
        function render(){
            error_log('ControladorLogin::render -> Cargando el index de login');
            $this->view->render('login/index');
        }
        
        function authenticate(){
            if($this->existPOST(['id_Medico', 'pass'])){
                $idMedico = $this->getPOST('id_Medico');
                $password = $this->getPOST('pass');

                $user = $this->model->login($idMedico, $password);

                if($user != null){
                    $this->initialize($user);
                }else{
                    $this->redirect('',['error' => ErrorMessages::ERROR_LOGIN_AUTHENTICATE_DATA]);
                }       
            }       
        }
    }
?>