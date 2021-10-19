<?php

    class Inicio extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->visualizar('inicio/index');
        }
    }
    
?>