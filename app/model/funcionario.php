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

        public function registerEmployee($nome,$senha,$email,$cargo,$usuario,$foto) {
            try{
                $register = $this->conn->prepare("INSERT INTO funcionarios (nome, senha, email, cargo, usuario, foto) VALUES (?,?,?,?,?,?)");
                $register->bindValue(1, $nome);
                $register->bindValue(2, $senha);
                $register->bindValue(3, $email);
                $register->bindValue(4, $cargo);
                $register->bindValue(5, $usuario);
                $register->bindValue(6, $foto);
                $register->execute();
                return TRUE;
            } catch(PDOException $e) {
                throw new PDOException($e->getMessage(), (int)$e->getCode());
            }
        }

        public function getEmployeeDadaById($id) {
            try{
                $consulta = $this->conn->prepare('SELECT * FROM funcionarios WHERE id = ?');
                $consulta->bindValue(1, $id);
                $consulta->execute();
                return $consulta;
            } catch(PDOException $e) {
                throw new PDOException($e->getMessage(), (int)$e->getCode());
            }
        }

        public function updateEmployeeDatas($nome,$senha,$email,$cargo,$usuario,$foto, $id) {
            try{
                $update = $this->conn->prepare("UPDATE funcionarios SET nome= ? , senha= ? , email= ? , cargo= ? , usuario= ?, foto= ?  WHERE id = ?");
                $update->bindValue(1, $nome);
                $update->bindValue(2, $senha);
                $update->bindValue(3, $email);
                $update->bindValue(4, $cargo);
                $update->bindValue(5, $usuario);
                $update->bindValue(6, $foto);
                $update->bindValue(7, $id);
                $update->execute();
                return true;
            } catch(PDOException $e) {
                throw new PDOException($e->getMessage(), (int)$e->getCode());
            }
        }
    }