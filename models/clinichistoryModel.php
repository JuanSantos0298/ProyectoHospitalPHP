<?php

    class ClinicHistoryModel extends Model implements IModel{
        
        //Campos de BD
        private $idHistorial;
        private $peso;
        private $altura;
        private $antecedentes;
        private $motivoConsulta;
        private $alergias;
        private $fecha;
        private $medicacion;
        private $historialPaciente; 
        private $historialMedico;    //ID con paciente
        
        public function __construct(){
            parent::__construct();
            $this->peso = '';
            $this->altura = '';
            $this->antecedentes = '';
            $this->motivoConsulta = '';
            $this->alergias = '';
            $this->fecha = '';
            $this->medicacion = '';
            $this->historialPaciente = 0;
            $this->historialMedico = 0;
        }

        public function save(){
            try{
                $query = $this->prepare('INSERT INTO historialmedico(peso, altura, antecedentes, motivoConsulta, alergias, fechaIngreso, medicacion, historialPaciente, historialMedico) 
                                         VALUES (:peso, :altura, :antecedentes, :motivoConsulta, :alergias, :fecha, :medicacion, :historialPaciente, :historialMedico)');
                $query->execute([
                    'peso'                  =>  $this->peso,
                    'altura'                =>  $this->altura,
                    'antecedentes'          =>  $this->antecedentes,
                    'motivoConsulta'        =>  $this->motivoConsulta,
                    'alergias'              =>  $this->alergias,
                    'fecha'                 =>  $this->fecha,
                    'medicacion'            =>  $this->medicacion,
                    'historialPaciente'     =>  $this->historialPaciente,
                    'historialMedico'       =>  $this->historialMedico
                ]);

                return true;
            }catch(PDOException $e){
                error_log('ClinicHistoryModel::save -> PDOException ' . $e);
                return false;
            }
        }

        public function getAll(){
            //deshabilitado
        }

        public function getAllByMedicPatient($idMedic,$idPatient){
            error_log('ClinicHistoryModel::getAllByMedic');
            $items = [];
            try{
                $query = $this->prepare('SELECT * FROM historialmedico WHERE historialMedico = :idMed && historialPaciente = :idPat'); 
                $query->execute(['idMed' => $idMedic,'idPat' => $idPatient]);
                while($p = $query->fetch(PDO::FETCH_ASSOC)){

                    $item = new ClinicHistoryModel();
                    
                    $item->setIDHistorial($p['id_historial']);
                    $item->setPeso($p['peso']);
                    $item->setAltura($p['altura']);
                    $item->setAntecedentes($p['antecedentes']);
                    $item->setMotivoConsulta($p['motivoConsulta']);
                    $item->setAlergias($p['alergias']);
                    $item->setFecha($p['fechaIngreso']);
                    $item->setMedicacion($p['medicacion']);
                    $item->setHistorialPaciente($p['historialPaciente']);
                    $item->setHistorialMedico($p['historialMedico']);

                    array_push($items,$item);
                }
                
                return $items;
                
            }catch(PDOException $e){
                error_log('PatientModel::getAll -> PDOException ' . $e);
            }
        }

        public function getAllByMedicPatientDate($idMedic,$idPatient,$date){
            error_log('ClinicHistoryModel::getAllByMedic');
            $items = [];
            try{
                $query = $this->prepare('SELECT * FROM historialmedico WHERE historialMedico = :idMed && historialPaciente = :idPat && fechaIngreso = :fecha'); 
                $query->execute(['idMed' => $idMedic,'idPat' => $idPatient, 'fecha' => $date]);
                while($p = $query->fetch(PDO::FETCH_ASSOC)){

                    $item = new ClinicHistoryModel();
                    
                    $item->setIDHistorial($p['id_historial']);
                    $item->setPeso($p['peso']);
                    $item->setAltura($p['altura']);
                    $item->setAntecedentes($p['antecedentes']);
                    $item->setMotivoConsulta($p['motivoConsulta']);
                    $item->setAlergias($p['alergias']);
                    $item->setFecha($p['fechaIngreso']);
                    $item->setMedicacion($p['medicacion']);
                    $item->setHistorialPaciente($p['historialPaciente']);
                    $item->setHistorialMedico($p['historialMedico']);

                    array_push($items,$item);
                }
                
                return $items;
                
            }catch(PDOException $e){
                error_log('PatientModel::getAll -> PDOException ' . $e);
            }
        }

        public function get($id){
            error_log('ClinicHistoryModel::get');
            try{
                $query = $this->prepare('SELECT * FROM historialmedico WHERE id_historial = :id'); 
                $query->execute(['id' => $id]);
                
                $user = $query->fetch(PDO::FETCH_ASSOC);
                
                $this->idHistorial          = $user['id_historial'];
                $this->peso                 = $user['peso'];
                $this->altura               = $user['altura'];
                $this->antecedentes         = $user['antecedentes'];
                $this->motivoConsulta       = $user['motivoConsulta'];
                $this->alergias             = $user['alergias'];
                $this->fecha                = $user['fechaIngreso'];
                $this->medicacion           = $user['medicacion'];
                $this->historialPaciente    = $user['historialPaciente'];
                $this->historialMedico      = $user['historialMedico'];

                return $this;
                
            }catch(PDOException $e){
                error_log('PatientModel::get -> PDOException ' . $e);
            }
        }

        public function delete($id){
            try{
                $query = $this->prepare('DELETE FROM historialmedico WHERE id_historial = :id'); 
                $query->execute([
                    'id' => $id
                ]);

                return true;
            }catch(PDOException $e){
                error_log('PacienteModel::delete -> PDOException ' . $e);
                return false;
            }
        }

        public function update(){
            try{
                $query = $this->prepare('UPDATE historialmedico SET peso = :peso, altura =:altura, antecedentes =:antecedenets, motivoConsulta =:motivoConsulta,
                                        alergias = :alergias, fechaIngreso = :fecha, medicacion = :medicacion
                                        WHERE historialPaciente = :idHistoria');
                $query->execute([
                    'peso'                  =>  $this->peso,
                    'altura'                =>  $this->altura,
                    'antecedentes'          =>  $this->antecedentes,
                    'motivoConsulta'        =>  $this->motivoConsulta,
                    'alergias'              =>  $this->alergias,
                    'fecha'                 =>  $this->fecha,
                    'medicacion'            =>  $this->medicacion,
                    'idHistoria'            => $this->idHistorial

                ]);
                
                return true;
                
            }catch(PDOException $e){
                error_log('ClinicHistoryModel::update -> PDOException ' . $e);
                return false;
            }
        }

        public function from($array){
            $this->idMedico         = $array['id_medico'];
            $this->nombre           = $array['nombre'];
            $this->apellidoPaterno  = $array['apellido_paterno'];
            $this->apellidoMaterno  = $array['apellido_materno'];
            $this->telefono         = $array['telefono'];
            $this->direccion        = $array['direccion'];
            $this->seguroMedico     = $array['seguroMedico'];
            $this->edad             = $array['edad'];
            $this->estadoCivil      = $array['estadoCivil'];
            $this->medicoAsignado   = $array['medicoAsignado'];
        }


        
        // Getters y Setters...
        public function setIDHistorial($idHistorial){       $this->idHistorial = $idHistorial; }
        public function setPeso($peso){                     $this->nombre = $peso; }
        public function setAltura($altura){                 $this->altura = $altura; }
        public function setAntecedentes($antecedentes){     $this->antecedentes = $antecedentes; }
        public function setMotivoConsulta($motivoConsulta){ $this->motivoConsulta = $motivoConsulta; }
        public function setAlergias($alergias){             $this->alergias = $alergias; }
        public function setFecha($fecha){                   $this->fecha = $fecha ; }
        public function setMedicacion($medicacion){         $this->medicacion = $medicacion ; }
        public function setHistorialPaciente($idPaciente){  $this->historialPaciente = $idPaciente ; }
        public function setHistorialMedico($medAs){         $this->historialMedico = $medAs; }

        public function getIDHistorial(){                   return $this->idHistorial; }
        public function getPeso(){                          return $this->nombre; }
        public function getAltura(){                        return $this->altura; }
        public function getAntecedentes(){                  return $this->antecedentes; }
        public function getMotivoConsulta(){                return $this->motivoConsulta; }
        public function getAlergias(){                      return $this->alergias; }
        public function getFecha(){                         return $this->fecha; }
        public function getMedicacion(){                    return $this->medicacion; }
        public function getHistorialPaciente(){             return $this->historialPaciente; }
        public function getHistorialMedico(){               return $this->istorialMedico; }
    
   
        
    }
?>