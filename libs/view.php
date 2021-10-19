<?php
    class View{
        
        function __construct(){
            echo "<p>Vista base</p>";
        }

        function visualizar($nombre){
            require 'views/' . $nombre . '.php';
        }
    }
?>