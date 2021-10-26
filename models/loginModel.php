<?php
    require_once 'medicModel.php';
    class LoginModel extends Model{
        
        function __construct(){
            parent::__construct();    
        }

        function login($idMedico,$password){
            try{
                $query = $this->prepare('SELECT * FROM medico WHERE id_medico = :idMedico');
                $query->execute(['idMedico' => $idMedico]);

                if($query->rowCount() == 1){
                    $item = $query->fetch(PDO::FETCH_ASSOC);
                    var_dump($item);
                    $user = new MedicModel();
                    $user->from($item);

                    if($password == $user->getPassword()){
                        error_log('LoginModel::login -> success');
                        return $user;
                    }
                }
                error_log('LoginModel::login -> error');
                return null;
            }catch(PDOException $e){
                error_log('LoginModel::login -> exception ' . $e);
                return null;
            }
        }

    }
?>