<?php
    
    class ErrorMessages{
        //Error_controlador_metodo_accion
        const ERROR_ADMIN_NEWCATEGORY_EXITS = "1234";

        private $errorList = [];
        
        public function __construct(){
            $this->errorList = [
                ErrorMessages::ERROR_ADMIN_NEWCATEGORY_EXITS => 'texto de error'
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