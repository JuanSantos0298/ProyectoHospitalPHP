<?php
    require_once 'models/medicModel.php';
    require_once 'models/patientModel.php';

    
    class UpdatePatient extends SessionController{

        private $user;
        private $idPaciente;
        function __construct(){
            parent::__construct();
            $this->user = $this->getUserSessionData();
            error_log('UpdatePatienteController::construct -> Controlador UpdatePatient iniciado');
            error_log('UpdatePatientController::construct -> Medico: ' . $this->user->getId());
        }
        
        function render(){
            error_log('UpdatePatiente::render -> Cargando el UpdatePatient del usuario');
           
            $patientModel = new PatientModel();
            $idMedic = $this->user->getId();
           
            $pacientes = $patientModel->getAllByMedic($idMedic);
            if($this->existPOST('idPaciente')){
                $this->idPaciente = $this->getPOST('idPaciente');
                error_log('UpdatePatiente::render -> IDPaciente = ' . $this->idPaciente);
            }
            $paciente = $patientModel->get($this->idPaciente);

            $this->view->render('dashboard/updatepatient', [
                'paciente' => $paciente
            ]);
        }
        
        function update(){
            if($this->existPOST(['nombre_paciente','apellido_p','apellido_Mp','telefono_p','direccion_p','seguro_medico_p','edad_p','estado_civil_p','idPaciente'])){
                $nombre = $this->getPOST('nombre_paciente');
                $apellidoPaterno = $this->getPOST('apellido_p');
                $apellidoMaterno = $this->getPOST('apellido_Mp');
                $edad = $this->getPOST('edad_p');
                $direccion = $this->getPOST('direccion_p');
                $telefono = $this->getPOST('telefono_p');
                $seguroMedico = $this->getPOST('seguro_medico_p');
                $estadoCivil = $this->getPOST('estado_civil_p');
                $medicoAsignado = $this->user->getId();
                $this->idPaciente = $this->getPOST('idPaciente');
                
                $nuevoPaciente = new PatientModel();
                $nuevoPaciente->setIDPaciente($this->idPaciente);
                $nuevoPaciente->setNombre($nombre);
                $nuevoPaciente->setApellidoPaterno($apellidoPaterno);
                $nuevoPaciente->setApellidoMaterno($apellidoMaterno);
                $nuevoPaciente->setEdad($edad);
                $nuevoPaciente->setDireccion($direccion);
                $nuevoPaciente->setTelefono($telefono);
                $nuevoPaciente->setSeguroMedico($seguroMedico);
                $nuevoPaciente->setEstadoCivil($estadoCivil);
                $nuevoPaciente->setMedicoAsignado($medicoAsignado);
            
                if($nuevoPaciente->update()){
                    error_log('Dashboard::update -> Actualizado con exito ' . $nombre);
                    $this->redirect('dashboard',['success' => SuccessMessages::SUCEESS_SIGNUP_NEWUSER]);
                }else{
                    $this->redirect('dashboard',['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
                }
            }else{
                error_log('UpdatePatient::update => Algo salio mal');
                $this->redirect('dashboard',['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
            }
        }
        

    }
?>