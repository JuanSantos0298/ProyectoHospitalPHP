<?php

    class SuccessMessages{
        const PRUEBA = "1234";
        const SUCEESS_SIGNUP_NEWUSER = "VZGtczF5jUp83gF";

        private $successList = [];

        public function __construct(){
            $this->successList = [
                SuccessMessages::PRUEBA => 'Mensaje de prueba',
                SuccessMessages::SUCEESS_SIGNUP_NEWUSER => 'Nuevo usuario registrado correctamente'

            ];
        }

        public function get($hash){
            return $this->successList[$hash];
        }

        public function existsKey($key){
            if(array_key_exists($key, $this->successList)){
                return true;
            }else{
                return false;
            }
        }
    }
?>