<?php

    class SuccessMessages{
        const PRUEBA = "1234";

        private $successList = [];

        public function __construct(){
            $this->successList = [
                SuccessMessages::PRUEBA => 'Mensaje de prueba'
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