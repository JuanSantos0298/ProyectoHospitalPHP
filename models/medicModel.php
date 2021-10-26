<?php

    class MedicModel extends Model implements IModel{
        
        //Campos de BD
        private $idMedico;
        private $nombre;
        private $apellidoPaterno;
        private $apellidoMaterno;
        private $especialidad;
        private $password;

        public function __construct(){
            parent::__construct();
            //$this->idMedico = 0;
            $this->nombre = '';
            $this->apellidoPaterno = '';
            $this->apellidoMaterno = '';
            $this->especialidad = '';
            $this->password = '';
        }

        public function save(){
            try{
                $query = $this->prepare('INSERT INTO medico(nombre, apellido_paterno, apellido_materno, especialidad, password) 
                                            VALUES (:nombre,:apPat,:apMat,:esp,:pass)');
                $query->execute([
                    'nombre'    =>  $this->nombre,
                    'apPat'     =>  $this->apellidoPaterno,
                    'apMat'     =>  $this->apellidoMaterno,
                    'esp'       =>  $this->especialidad,
                    'pass'      =>  $this->password
                ]);

                return true;
            }catch(PDOException $e){
                error_log('MedicModel::save -> PDOException ' . $e);
                return false;
            }
        }

        public function getAll(){
            $items = [];
            try{
                $query = $this->query('SELECT * FROM medico'); 
                
                while($p = $query->fetch(PDO::FETCH_ASSOC)){
                    $item = new MedicModel();
                    $item->setId($p['id_medico']);
                    $item->setNombre($p['nombre']);
                    $item->setApellidoPaterno($p['apellido_paterno']);
                    $item->setApellidoMaterno($p['apellido_materno']);
                    $item->setEspecialidad($p['especialidad']);
                    $item->setPassword($p['password']);

                    array_push($items,$item);
                }
                
                return $items;
                
            }catch(PDOException $e){
                error_log('MedicModel::getAll -> PDOException ' . $e);
            }
        }

        public function get($id){
            error_log('MedicModel::get');
            try{
                $query = $this->prepare('SELECT * FROM medico WHERE id_medico = :id'); 
                $query->execute(['id' => $id]);
                
                $user = $query->fetch(PDO::FETCH_ASSOC);
                
                $this->idMedico         = $user['id_medico'];
                $this->nombre           = $user['nombre'];
                $this->apellidoPaterno  = $user['apellido_paterno'];
                $this->apellidoMaterno  = $user['apellido_materno'];
                $this->especialidad     = $user['especialidad'];
                $this->password         = $user['password'];
                
                return $this;
                
            }catch(PDOException $e){
                error_log('MedicModel::get -> PDOException ' . $e);
            }
        }

        public function delete($id){
            try{
                $query = $this->prepare('DELETE FROM medico WHERE id_medico = :id'); 
                $query->execute([
                    'id' => $this->idMedico
                ]);

                return true;
            }catch(PDOException $e){
                error_log('MedicModel::delete -> PDOException ' . $e);
                return false;
            }
        }

        public function update(){
            try{
                $query = $this->prepare('UPDATE medico SET nombre = :nombre, apellido_paterno = :apellidoPaterno , apellido_materno = :apellidoMaterno, especialidad = :especialidad, password = :password WHERE id_medico = :idMedico');
                $query->execute([
                    'idMedico'          => $this->idMedico,
                    'nombre'            => $this->nombre,
                    'apellidoPaterno'   => $this->apellidoPaterno,
                    'apellidoMaterno'   => $this->apellidoMaterno,
                    'especialidad'      => $this->especialidad,
                    'password'          => $this->password

                ]);
                
                return true;
                
            }catch(PDOException $e){
                error_log('MedicModel::get -> PDOException ' . $e);
                return false;
            }
        }

        public function from($array){
            $this->idMedico         = $array['id_medico'];
            $this->nombre           = $array['nombre']; 
            $this->apellidoPaterno  = $array['apellido_paterno'];
            $this->apellidoMaterno  = $array['apellido_materno'];
            $this->especialidad     = $array['especialidad'];
            $this->password         = $array['password'];
        }

        //Para login y registro
        public function exists($idMedic){
            try{
                $query = $this->prepare('SELECT id_medico FROM medico WHERE id_medico=:idMedico');
                $query->execute([
                    'idMedico' => $idMedic
                ]);
                if($query->rowCount() > 0){
                    return true;
                }else{
                    return false;
                }
                
            }catch(PDOException $e){
                error_log('MedicModel::exists -> PDOException ' . $e);
                return false;
            }
        }

        public function comparePasswords($password, $idMedico){
            try{
                $user = $this->get($idMedico);
                return password_verify($password, $user->getPassword());
            }catch(PDOException $e){
                error_log('MedicModel::exists -> PDOException ' . $e);
                return false;
            }
        }
        // Getters y Setters...
        public function setId($id){                         $this->idMedico = $id;}
        public function setNombre($nombre){                 $this->nombre = $nombre;}
        public function setApellidoPaterno($apPaterno){     $this->apellidoPaterno = $apPaterno;}
        public function setApellidoMaterno($apMaterno){     $this->apellidoMaterno = $apMaterno;}
        public function setEspecialidad($especialida){      $this->especialidad = $especialida;}
        public function setPassword($password){             $this->password = $password;}
        
        public function getId(){                return $this->idMedico;}
        public function getNombre(){            return $this->nombre;}
        public function getApellidoPaterno(){   return $this->apellidoPaterno;}
        public function getApellidoMaterno(){   return $this->apellidoMaterno;}
        public function getEspecialidad(){      return $this->especialidad;}
        public function getPassword(){          return $this->password;}
        
    }
?>