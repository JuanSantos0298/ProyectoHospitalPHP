<?php
    include_once 'libs/imodel.php';
    //Modelo base
    class Model{
        
        function __construct(){
            $this->db = Database::getInstance();
        }
        
        function query($query){
            return $this->db->connect()->query($query);
        }

        function prepare($query){
            return $this->db->connect()->prepare($query);
        }
    }
?>