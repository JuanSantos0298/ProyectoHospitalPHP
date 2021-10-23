<?php

    class LoginModel extends Model{
        
        public function __construct(){
            parent::__construct();
        }

        public function autenticarUsuario(){
            echo "<p> Autenticando usuario - Model </p>";
            
        }

    }

?>