<?php
    
include_once 'Models/ConexionDB.php';

class User extends Conexion{
    private $nombre;
    private $idusuario;
    

    public function existeUsuario($user,$pass){
        $md5pass = md5($pass);
        $query = $this->__construct()->prepare('SELECT * FROM medico WHERE id_medico = :user AND password = :pass');
        $query->execute(['user'=> $user, 'pass'=> $md5pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->__construct->prepare('SELECT * from medico WHERE id_medico = :user');
        $query->execute(['idusuario' => $user]);

        foreach ($query as $usuarioActual){
            $this->nombre = $usuarioActual['nombre'];
            $this->username= $usuarioActual['id_medico'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
}

?>