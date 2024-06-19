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

        public function getAllClientData(){
            $this->getConnectionDataBase();
            try{
                $consulta = $this->conn->prepare('Select * from clientes');
                $consulta->execute();
                return $consulta;
            } catch(PDOException $e) {
                throw new PDOException($e->getMessage(), (int)$e->getCode());
            }
        }

        public function registerClient($nome,$senha,$email,$endereco,$cep){
            $this->getConnectionDataBase();
            try{
                $register = $this->conn->prepare("INSERT into clientes (nome, senha, email, endereco, cep) VALUES (?,?,?,?,?)");
                $register->bindValue(1, $nome);
                $register->bindValue(2, $senha);
                $register->bindValue(3, $email);
                $register->bindValue(4, $endereco);
                $register->bindValue(5, $cep);
                $register->execute();
            } catch(PDOException $e) {
                throw new PDOException($e->getMessage(), (int)$e->getCode());
            }
        }
    }
?>