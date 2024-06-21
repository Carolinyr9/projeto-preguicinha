<?php 
    require_once '../../config/database.php';

    class Funcionario{
        private $conn;

        public function __constructor(){
            $database = new DataBase;
            $this->conn = $database->getConnection();
        }

        

    }