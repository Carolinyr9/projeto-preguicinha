<?php 
    require_once '../../config/database.php';

    class Cliente{
        private $nome;
        private $email;
        private $senha;
        private $endereco;
        private $cep;
        private $conn;

        private function getConnectionDataBase(){
            $database = new DataBase;
            $this->conn = $database->getConnection();
        }



    }
?>