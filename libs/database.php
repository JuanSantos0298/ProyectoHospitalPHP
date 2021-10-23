<?php
    class Database{

        private $host;
        private $db;
        private $user;
        private $password;
        private $charset;

        private static $instance;

        private function __construct(){
            $this->host = constant('HOST');
            $this->db = constant('DB');
            $this->user = constant('USER');
            $this->password = constant('PASSWORD');
            $this->charset = constant('CHARSET');
        }

        private function conectar(){
            try{
                $connection = "mysql:host=" . $this->host . ";dbname = " . $this->db . ";charset =" . $this->charset;
                $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
                ];

                $pdo = new PDO($connection, $this->user, $this->password, $options);

                return $pdo;

            }catch(PDOException $e){
                print_r('Error conexión: ' . $e->getMessage());
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