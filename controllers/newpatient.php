<?php
    require_once 'models/medicModel.php';
    require_once 'models/patientModel.php';

    class NewPatient extends SessionController{

        private $user;

        function __construct(){
            error_log('NewPatientController::construct');
            parent::__construct();
            $this->user = $this->getUserSessionData();
            error_log('NewPatientController::construct -> Medico: ' . $this->user->getId());
            
        } 

        function render(){
            error_log('NewPatientController::render');
            $this->view->render('dashboard/newpatient', []);
        }

        function addNewPatient(){
            error_log('NewPatientController::addNewPatient');
            if($this->existPOST(['nombre_p','apellido_p','apellido_m','edad_p','direccion_p','telefono_p','seguro_p','estadoc_p'])){
                $nombre = $this->getPOST('nombre_p');
                $apellidoPaterno = $this->getPOST('apellido_p');
                $apellidoMaterno = $this->getPOST('apellido_m');
                $edad = $this->getPOST('edad_p');
                $direccion = $this->getPOST('direccion_p');
                $telefono = $this->getPOST('telefono_p');
                $seguroMedico = $this->getPOST('seguro_p');
                $estadoCivil = $this->getPOST('estadoc_p');
                $medicoAsignado = $this->user->getId();
                
                $nuevoPaciente = new PatientModel();
                $nuevoPaciente->setNombre($nombre);
                $nuevoPaciente->setApellidoPaterno($apellidoPaterno);
                $nuevoPaciente->setApellidoMaterno($apellidoMaterno);
                $nuevoPaciente->setEdad($edad);
                $nuevoPaciente->setDireccion($direccion);
                $nuevoPaciente->setTelefono($telefono);
                $nuevoPaciente->setSeguroMedico($seguroMedico);
                $nuevoPaciente->setEstadoCivil($estadoCivil);
                $nuevoPaciente->setMedicoAsignado($medicoAsignado);
            
                if($nuevoPaciente->save()){
                    $this->redirect('dashboard',['success' => SuccessMessages::SUCEESS_SIGNUP_NEWUSER]);
                }else{
                    $this->redirect('newpatient',['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
                }
            }else{
                $this->redirect('newpatient',['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
            }
        }
    }

?>