<?php

    class LoginModel extends Model{
        
        public function __construct(){
            parent::__construct();
        }

        public function autenticarUsuario($idMedico, $password){
            //echo "<p> Autenticando usuario - Model </p>";
            //echo "Usuario: " . $idMedico . " Password: " . $password; 

            $query = $this->db->connect()->prepare('SELECT * FROM medico WHERE id_medico = :idM && password = :pass;');
            $query->execute(['idM' => $idMedico, 
                             'pass' => $password]);
            if($query->rowCount()){
                return true;
            }else{
                return false;
            }
        }
    }

?>