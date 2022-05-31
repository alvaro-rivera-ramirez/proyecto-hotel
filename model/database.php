<?php
    class DB{
        private $host;
        private $db;
        private $user;
        private $password;
        private $charset;

        public function __construct(){
            $this->host = 'localhost';
            $this->db = 'hotelmr';
            $this->user = 'root';
            $this->password = '';
            $this->charset = 'utf8mb4';
        }

        public function connect(){
            
            try{
                $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];
                $connection=new PDO("mysql:host=$this->host; dbname=$this->db;charset=$this->charset",$this->user,$this->password,$options);
                return $connection;
            }catch(PDOException $e){
                die("Error connection". $e->getMessage);
                

            }

        }
    }