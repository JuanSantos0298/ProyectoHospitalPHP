<?php
    require_once 'models/medicModel.php';
    require_once 'models/patientModel.php';
    require_once 'models/clinichistoryModel.php';

    
    class ClinicHistoryList extends SessionController{

        private $user;
        
        function __construct(){
            parent::__construct();
            $this->user = $this->getUserSessionData();
            error_log('ClinicHistoryList::construct -> Controlador historias clinicas iniciado');
            error_log('ClinicHistoryList::construct -> Medico: ' . $this->user->getId());
            
        }
        
        function render(){
            error_log('ClinicHistoryList::render -> Cargando el historial clinico');
            $clinicHistory = new ClinicHistoryModel();
            $idMedic = $this->user->getId();
            $historias = $clinicHistory->getAllByMedic($idMedic);

            $this->view->render('dashboard/clinichistorylist', [
                'user'      => $this->user,
                'historias' => $historias
            ]);
        }
    }
?>