<?php
    
    class Errores extends Controller{
        
        function __construct(){
            parent::__construct();
            error_log('Errores::construct -> Iniciado controlador Errores');
        }

        function render(){
            $this->view->render('errores/index');
        }
    }
    
?>