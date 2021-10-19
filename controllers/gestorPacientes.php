<?php

    class GestorPacientes extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->visualizar('gestorPacientes/index');
        }
    }
    
?>