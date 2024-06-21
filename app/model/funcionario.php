<?php 
    require_once '../../config/database.php';

    class Funcionario{
        private $conn;

        public function __construct(){
            $database = new DataBase;
            $this->conn = $database->getConnection();
        }

        public function loginEmployee($email,$senha) {
            try{
                $login = $this->conn->prepare('SELECT * FROM funcionarios WHERE email = ? AND senha = ?');
                $login->bindParam(1, $email);
                $login->bindParam(2, $senha);
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

        public function getAllEmployeeData(){
            try{
                $consulta = $this->conn->prepare('SELECT * FROM funcionarios');
                $consulta->execute();
                return $consulta;
            } catch(PDOException $e) {
                throw new PDOException($e->getMessage(), (int)$e->getCode());
            }
        }

    }