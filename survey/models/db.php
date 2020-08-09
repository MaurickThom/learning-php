<?php 

    class DB {
        private $host;
        private $dbName;
        private $username;
        private $password;
        private $charset;

        public function __construct(){
            $this->host     = 'localhost';
            $this->db       = 'surveyDB';
            $this->user     = 'root';
            $this->password = "mysql";
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
    }

?>