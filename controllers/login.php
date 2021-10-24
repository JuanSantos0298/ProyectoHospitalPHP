<?php
    
    class Login extends Controller{
        
        function __construct(){
            parent::__construct();
            $this->view->render('login/index');
            //echo "<p>Constructor Login</p>";
            
        }
        function autenticarUsuario(){
            //echo "<p>Verificar usuario - método controlador </p>";
            $idMedico = $_POST['idMedico'];
            $password = $_POST['password'];
            
            //echo "Usuario: " . $idMedico . " Password: " . $password; 
            
            if($this->model->autenticarUsuario($idMedico,$password)){
                echo "Usuario validado";
                $this->userSession->setCurrentUser($idMedico);
                $this->view->render('error/index');
            }else{
                $this->view->errorLogin = "Nombre de usuario y/o contraseña incorrectos.";
                
                //$this->view->render('login/index');
                
            }
        }
    }

?>