<?php
    
    class ErrorMessages{
        //Error_controlador_metodo_accion
        const ERROR_ADMIN_NEWCATEGORY_EXITS = "1234";
        const ERROR_SIGNUP_NEWUSER = "kCyci8TPD9CNLLu";
        const ERROR_SIGNUP_NEWUSER_EMPTY = "PhGeyB2CNyMhbjX";
        const ERROR_LOGIN_AUTHENTICATE_DATA = "vMY8zwLwy463E6Y";



        private $errorList = [];
        
        public function __construct(){
            $this->errorList = [
                ErrorMessages::ERROR_ADMIN_NEWCATEGORY_EXITS => 'texto de error',
                ErrorMessages::ERROR_SIGNUP_NEWUSER => 'Ocurrio un error al procesas la solicitud',
                ErrorMessages::ERROR_SIGNUP_NEWUSER_EMPTY => 'Llena los campos de ID y password',
                ErrorMessages::ERROR_LOGIN_AUTHENTICATE_DATA => 'ID de usuario y/o contraseña incorrectos'

            ];
        }

        public function get($hash){
            return $this->errorList[$hash];
        }

        public function existsKey($key){
            if(array_key_exists($key, $this->errorList)){
                return true;
            }else{
                return false;
            }
        }
    }
?>