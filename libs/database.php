<?php
    class Database{

        private $host;
        private $db;
        private $user;
        private $password;
        private $charset;
        
        private static $instance;

        public function __construct(){
            $this->host     = 'localhost';
            $this->db       = 'hospitalphp';
            $this->user     = 'root';
            $this->password = "";
            $this->charset  = 'utf8mb4';
        }
    
        function connect(){
        
            try{
                
                $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
                $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];
                $pdo = new PDO($connection, $this->user, $this->password, $options);
        
                return $pdo;
    
            }catch(PDOException $e){
                print_r('Error connection: ' . $e->getMessage());
            }   
        }

        public static function getInstance(){
            if(!isset(Database::$instance)){
                Database::$instance = new Database();
            }
                return Database::$instance;
        }
    }
?>