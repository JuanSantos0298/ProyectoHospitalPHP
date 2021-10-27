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
        
        public function searchPatient(){
            error_log('ControladorDashboard::render -> Cargando el dashboard del usuario');
            $patientModel = new PatientModel();
            $idMedic = $this->user->getId();
            $clave = $this->getPOST('clave');
            $clave = '%' . $clave . '%';
            $pacientes = $patientModel->getAllBySearch($clave);

            $this->view->render('dashboard/index', [
                'user'      => $this->user,
                'pacientes' => $pacientes
            ]);
        }
        
        function deletePatient(){
            if($this->existPOST(['id_eliminar'])){
                error_log('Dashboard::deletePatiente');
                $idPaciente = $this->getPOST('id_eliminar');
                $paciente = new PatientModel();
                if($paciente->delete($idPaciente)){
                    error_log('Dashboard::deletePatient -> Paciente eliminado');
                    $this->render();
                }else{
                    error_log('Dashboard::deletePatient -> Error: ocurrio un error al eliminar al paciente');
                }
            }
        }
        
        function update(){
            if($this->existPOST(['nombre_paciente','apellido_p','apellido_Mp','telefono_p','direccion_p','seguro_medico_p','edad_p','estado_civil_p'])){
                $nombre = $this->getPOST('nombre_paciente');
                $apellidoPaterno = $this->getPOST('apellido_p');
                $apellidoMaterno = $this->getPOST('apellido_Mp');
                $edad = $this->getPOST('edad_p');
                $direccion = $this->getPOST('direccion_p');
                $telefono = $this->getPOST('telefono_p');
                $seguroMedico = $this->getPOST('seguro_medico_p');
                $estadoCivil = $this->getPOST('estado_civil_p');
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
            
                if($nuevoPaciente->update()){
                    error_log('Dashboard::update -> Actualizado con exito');
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