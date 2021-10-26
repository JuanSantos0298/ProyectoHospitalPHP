<?php
    require_once 'models/medicModel.php';
    require_once 'models/patientModel.php';

    
    class Dashboard extends SessionController{

        private $user;
        
        function __construct(){
            parent::__construct();
            $this->user = $this->getUserSessionData();
            error_log('ControladorDashboard::construct -> Controlador dashboard iniciado');
            error_log('ControladorDashboard::construct -> Medico: ' . $this->user->getId());
            
        }
        
        function render(){
            error_log('ControladorDashboard::render -> Cargando el dashboard del usuario');
            $patientModel = new PatientModel();
            $idMedic = $this->user->getId();
            $pacientes = $patientModel->getAllByMedic($idMedic);

            $this->view->render('dashboard/index', [
                'user'      => $this->user,
                'pacientes' => $pacientes
            ]);
        }
        
        public function getPatients(){
            
        }
        
        public function getMedicalRecords(){
            
        }
    }
?>