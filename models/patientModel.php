<?php

    class PatientModel extends Model implements IModel{
        
        //Campos de BD
        private $idPaciente;
        private $nombre;
        private $apellidoPaterno;
        private $apellidoMaterno;
        private $telefono;
        private $direccion;
        private $seguroMedico;
        private $edad;
        private $estadoCivil;
        private $medicoAsignado;
        
        public function __construct(){
            parent::__construct();
            //$this->idMedico = 0;
            $this->nombre = '';
            $this->apellidoPaterno = '';
            $this->apellidoMaterno = '';
            $this->telefono = '';
            $this->direccion = '';
            $this->seguroMedico = '';
            $this->edad = 0;
            $this->estadoCivil = '';
            $this->medicoAsignado = 0;
        }

        public function save(){
            try{
                $query = $this->prepare('INSERT INTO paciente(nombre, apellido_paterno, apellido_materno, telefono, direccion, seguroMedico, edad, estadoCivil, medicoAsignado) 
                                         VALUES (:nombre, :apPat, :apMat, :tel, :dir, :segM, :edad, :estC, :medAs)');
                $query->execute([
                    'nombre'    =>  $this->nombre,
                    'apPat'     =>  $this->apellidoPaterno,
                    'apMat'     =>  $this->apellidoMaterno,
                    'tel'       =>  $this->telefono,
                    'dir'       =>  $this->direccion,
                    'segM'      =>  $this->seguroMedico,
                    'edad'      =>  $this->edad,
                    'estC'      =>  $this->estadoCivil,
                    'medAs'     =>  $this->medicoAsignado
                ]);

                return true;
            }catch(PDOException $e){
                error_log('PatientModel::save -> PDOException ' . $e);
                return false;
            }
        }

        public function getAll(){
            //deshabilitado
        }

        public function getAllByMedic($idMedic){
            error_log('PatientModel::getAllByMedic');
            $items = [];
            try{
                $query = $this->prepare('SELECT * FROM paciente WHERE medicoAsignado = :idMed'); 
                $query->execute(['idMed' => $idMedic]);
                while($p = $query->fetch(PDO::FETCH_ASSOC)){
                    $item = new PatientModel();
                    $item->setIDPaciente($p['id_paciente']);
                    $item->setNombre($p['nombre']);
                    $item->setApellidoPaterno($p['apellido_paterno']);
                    $item->setApellidoMaterno($p['apellido_materno']);
                    $item->setTelefono($p['telefono']);
                    $item->setDireccion($p['direccion']);
                    $item->setSeguroMedico($p['seguroMedico']);
                    $item->setEdad($p['edad']);
                    $item->setEstadoCivil($p['estadoCivil']);
                    $item->setMedicoAsignado($p['medicoAsignado']);

                    array_push($items,$item);
                }
                
                return $items;
                
            }catch(PDOException $e){
                error_log('PatientModel::getAll -> PDOException ' . $e);
            }
        }

        public function getAllBySearch($clave){
            error_log('PatientModel::getAllByMedic');
            $items = [];
            try{
                $query = $this->prepare('SELECT * FROM paciente WHERE (SELECT CONCAT(nombre, " ", apellido_paterno, " ", apellido_materno) full_name) LIKE :clave;'); 
                $query->execute(['clave' => $clave]);
                
                while($p = $query->fetch(PDO::FETCH_ASSOC)){
                    $item = new PatientModel();
                    $item->setIDPaciente($p['id_paciente']);
                    $item->setNombre($p['nombre']);
                    $item->setApellidoPaterno($p['apellido_paterno']);
                    $item->setApellidoMaterno($p['apellido_materno']);
                    $item->setTelefono($p['telefono']);
                    $item->setDireccion($p['direccion']);
                    $item->setSeguroMedico($p['seguroMedico']);
                    $item->setEdad($p['edad']);
                    $item->setEstadoCivil($p['estadoCivil']);
                    $item->setMedicoAsignado($p['medicoAsignado']);

                    array_push($items,$item);
                }
                
                return $items;
                
            }catch(PDOException $e){
                error_log('PatientModel::getAll -> PDOException ' . $e);
            }
        }

        public function get($id){
            error_log('PatientModel::get');
            try{
                $query = $this->prepare('SELECT * FROM paciente WHERE id_paciente = :id'); 
                $query->execute(['id' => $id]);
                
                $user = $query->fetch(PDO::FETCH_ASSOC);
                
                $this->idPaciente         = $user['id_paciente'];
                $this->nombre           = $user['nombre'];
                $this->apellidoPaterno  = $user['apellido_paterno'];
                $this->apellidoMaterno  = $user['apellido_materno'];
                $this->telefono         = $user['telefono'];
                $this->direccion        = $user['direccion'];
                $this->seguroMedico     = $user['seguroMedico'];
                $this->edad             = $user['edad'];
                $this->estadoCivil      = $user['estadoCivil'];
                $this->medicoAsignado   = $user['medicoAsignado'];

                return $this;
                
            }catch(PDOException $e){
                error_log('PatientModel::get -> PDOException ' . $e);
            }
        }

        public function delete($id){
            try{
                $query = $this->prepare('DELETE FROM paciente WHERE id_paciente = :id'); 
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
                error_log('PatientModel::update => ' . $this->idPaciente);
                $query = $this->prepare('UPDATE paciente SET nombre = :nombre, apellido_paterno = :apellidoPaterno, apellido_materno = :apellidoMaterno, telefono = :telefono, direccion = :direccion, 
                                                             seguroMedico = :seguroMedico, edad = :edad, estadoCivil = :estadoCivil  WHERE id_paciente = :idPaciente');
                $query->execute([
                    'nombre'            => $this->nombre,
                    'apellidoPaterno'   => $this->apellidoPaterno,
                    'apellidoMaterno'   => $this->apellidoMaterno,
                    'telefono'          => $this->telefono,
                    'direccion'         => $this->direccion,
                    'seguroMedico'      => $this->seguroMedico,
                    'edad'              => $this->edad,
                    'estadoCivil'       => $this->estadoCivil,
                    'idPaciente'        => $this->idPaciente

                ]);
                
                return true;
                
            }catch(PDOException $e){
                error_log('PacientModel::update -> PDOException ' . $e);
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
        public function setIDPaciente($idPaciente){     $this->idPaciente = $idPaciente; }
        public function setNombre($nombre){             $this->nombre = $nombre; }
        public function setApellidoPaterno($apPat){     $this->apellidoPaterno = $apPat; }
        public function setApellidoMaterno($apMat){     $this->apellidoMaterno = $apMat; }
        public function setTelefono($tel){              $this->telefono = $tel; }
        public function setDireccion($dir){             $this->direccion = $dir; }
        public function setSeguroMedico($segM){         $this->seguroMedico = $segM ; }
        public function setEdad($edad){                 $this->edad = $edad; }
        public function setEstadoCivil($estC){          $this->estadoCivil = $estC ; }
        public function setMedicoAsignado($medAs){      $this->medicoAsignado = $medAs; }

        public function getIDPaciente(){        return $this->idPaciente; }
        public function getNombre(){            return $this->nombre; }
        public function getApellidoPaterno(){   return $this->apellidoPaterno; }
        public function getApellidoMaterno(){   return $this->apellidoMaterno; }
        public function getTelefono(){          return $this->telefono; }
        public function getDireccion(){         return $this->direccion; }
        public function getSeguroMedico(){      return $this->seguroMedico; }
        public function getEdad(){              return $this->edad; }
        public function getEstadoCivil(){       return $this->estadoCivil; }
        public function getMedicoAsignado(){    return $this->medicoAsignado; }
    
    
        
    }
?>