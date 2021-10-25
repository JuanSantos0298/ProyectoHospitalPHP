<?php

    class Dashboard extends SessionController{

        function __construct(){
            parent::__construct();
            error_log('ControladorDashboard::construct -> Controlador dashboard iniciado');
        }
        
        function render(){
            error_log('ControladorDashboard::render -> Cargando el dashboard del usuario');
            $this->view->render('dashboard/index', []);
        }
        public function getPatients(){
            
        }
        public function getMedicalRecords(){
            
        }
    }
?>