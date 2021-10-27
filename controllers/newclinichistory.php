<?php
    require_once 'models/medicModel.php';
    require_once 'models/patientModel.php';
    require_once 'models/clinichistoryModel.php';

    
    class NewClinicHistory extends SessionController{

        private $user;
        private $paciente;
        private $idPatient;
        
        function __construct(){
            parent::__construct();
            $this->user = $this->getUserSessionData();
            if($this->existPOST(['idPaciente'])){
                $this->idPatient = $this->getPOST('idPaciente');
                error_log('NewClinicHistoryController::construct -> Paciente guardado' . $this->idPatient);
            }else{  
                error_log('ClinicHistoryList::construct -> No se encontro ID Paciente');
            }
            
            error_log('ClinicHistoryList::construct -> Controlador historias clinicas iniciado');
            error_log('ClinicHistoryList::construct -> Medico: ' . $this->user->getId());
            
        }
        
        function render(){
                error_log('NewClinicHistoryList::render -> Cargando vista registro nueva historia clinica');
                $this->view->render('dashboard/newclinichistory', ['idPaciente' => $this->idPatient]);
        }

        function register(){
            if($this->existPOST(['peso_paciente', 'altura_p', 'antecendentes_p', 'motivo_p', 'fecha_ingreso_p','medicacion_p','alergias_p'])){
                $peso = $this->getPOST('peso_paciente');
                $altura = $this->getPOST('altura_p');
                $antecedentes = $this->getPOST('antecendentes_p');
                $motivo = $this->getPOST('motivo_p');
                $fecha = $this->getPOST('fecha_ingreso_p');
                $medicacion = $this->getPOST('medicacion_p');
                $alergias = $this->getPOST('alergias_p');
                $idMedico = $this->user->getId();
                $idPaciente = $this->idPatient;
                error_log('NewClinicHistory::register - > ' . $idPaciente);
                $historia = new ClinicHistoryModel();
                $historia->setPeso($peso);
                $historia->setAltura($altura);
                $historia->setAntecedentes($antecedentes);
                $historia->setMotivoConsulta($motivo);
                $historia->setFecha($fecha);
                $historia->setMedicacion($medicacion);
                $historia->setAlergias($alergias);
                $historia->setHistorialMedico($idMedico);
                $historia->setHistorialPaciente($idPaciente);
                
                if($historia->save()){
                    error_log('NewClinicHistory::register -> nuevo paciente guardado');
                    $this->redirect('clinichistorylist/render',['success' => SuccessMessages::SUCEESS_SIGNUP_NEWUSER]);
                }else{
                    
                    error_log('NewClinicHistory::register -> ocurrio un error');
                    $this->redirect('newclinichistory',['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
                }
                

            }
        }
    }
?>