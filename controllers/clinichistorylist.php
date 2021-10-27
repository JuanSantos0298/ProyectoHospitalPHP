<?php
    require_once 'models/medicModel.php';
    require_once 'models/patientModel.php';
    require_once 'models/clinichistoryModel.php';

    
    class ClinicHistoryList extends SessionController{

        private $user;
        private $idPatient;
        
        function __construct(){
            parent::__construct();
            $this->user = $this->getUserSessionData();
            if($this->existPOST('idPaciente')){
                $this->idPatient = $this->getPOST('idPaciente');
            }
            error_log('ClinicHistoryList::construct -> ' . $this->idPatient);
            error_log('ClinicHistoryList::construct -> Controlador historias clinicas iniciado');
            error_log('ClinicHistoryList::construct -> Medico: ' . $this->user->getId());
            
        }
        
        function render(){
                error_log('ClinicHistoryList::render -> Cargando el historial clinico');
            
                
                $clinicHistory = new ClinicHistoryModel();
                $idMedic = $this->user->getId();
                $historias = $clinicHistory->getAllByMedicPatient($idMedic, $this->idPatient);
                error_log('ClinicHistoryList::render -> ' . $this->idPatient);
                $this->view->render('dashboard/clinichistorylist', [
                    'idPaciente'    => $this->idPatient,
                    'user'          => $this->user,
                    'historias'     => $historias
                ]);
        }

        function delete(){
            if($this->existPOST(['id_eliminar'])){
                error_log('ClinicHistoryList::deletePatiente');
                $idHistoria = $this->getPOST('id_eliminar');
                $this->idPatient = $this->getPOST('idPaciente');
                $historia = new ClinicHistoryModel();
                if($historia->delete($idHistoria)){
                    error_log('ClinicHistoryList::delete -> Historia eliminada');
                    $this->render();
                }else{
                    error_log('ClinicHistoryList::delete -> Error: ocurrio un error al eliminar la historia');
                }
            }
        }

        function search(){
            if($this->existPOST(['buscar_p','idPaciente'])){
                error_log('ClinicHistoryList::search -> buscando por feceha');
                $fecha = new DateTime($this->getPOST('buscar_p'));
                $fechaS = $fecha->format('d/m/Y');
                error_log('ClinicHistoryList::delete -> fecha: ' . $fechaS);
                $idMedic = $this->user->getId();
                $historia = new ClinicHistoryModel();
                $this->idPatient = $this->getPOST('idPaciente');
                
                $historias = $historia->getAllByMedicPatientDate($idMedic, $this->idPatient,$fechaS);

                $this->view->render('dashboard/clinichistorylist', [
                  'idPaciente'  => $this->idPatient,
                  'user'        => $this->user,
                  'historias'   => $historias
                ]);
            }
        }

        function register(){
            if($this->existPOST(['idPaciente','peso_paciente', 'altura_p', 'antecendentes_p', 'motivo_p', 'fecha_ingreso_p','medicacion_p','alergias_p'])){
                $peso = $this->getPOST('peso_paciente');
                $altura = $this->getPOST('altura_p');
                $antecedentes = $this->getPOST('antecendentes_p');
                $motivo = $this->getPOST('motivo_p');
                $fecha = $this->getPOST('fecha_ingreso_p');
                $medicacion = $this->getPOST('medicacion_p');
                $alergias = $this->getPOST('alergias_p');
                $idMedico = $this->user->getId();
                $this->idPatient = $this->getPOST('idPaciente');
                error_log('NewClinicHistory::register - > ' . $peso);
                
                $historia = new ClinicHistoryModel();
                $historia->setPeso($peso);
                $historia->setAltura($altura);
                $historia->setAntecedentes($antecedentes);
                $historia->setMotivoConsulta($motivo);
                $historia->setFecha($fecha);
                $historia->setMedicacion($medicacion);
                $historia->setAlergias($alergias);
                $historia->setHistorialMedico($idMedico);
                $historia->setHistorialPaciente($this->idPatient);
                
                if($historia->save()){
                    error_log('NewClinicHistory::register -> nuevo paciente guardado');
                    $this->render();
                }else{
                    
                }
                

            }
        }
    }
?>