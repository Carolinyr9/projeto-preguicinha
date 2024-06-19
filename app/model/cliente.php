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

        public function loginClient($email,$senha){
            $this->getConnectionDataBase();
            try{
                $login = $this->conn->prepare('SELECT * FROM clientes WHERE email = :email AND senha = :senha');
                $login->bindParam(":email", $email);
                $login->bindParam(":senha", $senha);
                $login->execute();

                if ($login->rowCount() > 0) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            }catch(PDOException $e) {
                throw new PDOException($e->getMessage(), (int)$e->getCode());
            }
        }

        public function getAllClientData(){
            $this->getConnectionDataBase();
            try{
                $consulta = $this->conn->prepare('SELECT * FROM clientes');
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

        public function getClientDadaById($id) {
            $this->getConnectionDataBase();
            try{
                $consulta = $this->conn->prepare('SELECT * FROM clientes WHERE id = ?');
                $consulta->bindValue(1, $id);
                $consulta->execute();
                return $consulta;
            } catch(PDOException $e) {
                throw new PDOException($e->getMessage(), (int)$e->getCode());
            }
        }

    }
?>