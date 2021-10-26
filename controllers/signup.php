<?php
    require_once 'models/medicModel.php';
    class Signup extends SessionController{
        
        function __construct(){
            parent::__construct();
            
        } 

        function render(){
            $this->view->render('login/signup', []);
        }

        function newUser(){
            if($this->existPOST(['nombre_m','apellido_pm','apellido_Mm','especilidad_m','pass'])){
                $nombre = $this->getPOST('nombre_m');
                $apellidoPaterno = $this->getPOST('apellido_pm');
                $apellidoMaterno = $this->getPOST('apellido_Mm');
                $especialidad = $this->getPOST('especilidad_m');
                $password = $this->getPOST('pass');

                //Metodo verificacion de campos llenos
                
                $user = new MedicModel();
                $user->setNombre($nombre);
                $user->setApellidoPaterno($apellidoPaterno);
                $user->setApellidoMaterno($apellidoMaterno);
                $user->setEspecialidad($especialidad);
                $user->setPassword($password);

                /* verificar si existe --deshabilitado temporalmente
                if(!$user->exists($idMedico)){
                    //NO existe ese ID
                    if($user->save()){
                        $this->redirect('',['success' => SuccessMessages::SUCEESS_SIGNUP_NEWUSER]);
                    }else{
                        $this->redirect('signup',['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
                    }
                }*/
                if($user->save()){
                    $this->redirect('',['success' => SuccessMessages::SUCEESS_SIGNUP_NEWUSER]);
                }else{
                    $this->redirect('signup',['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
                }
            }else{
                $this->redirect('signup',['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
            }
        }
    }

?>