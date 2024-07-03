<?php 
    require_once '../model/funcionario.php';

    class FuncionarioController{
        private $funcionario;

        public function __construct(){
            $this->funcionario = new Funcionario;
        }

        public function loginEmployee($email,$senha){
            $login = $this->funcionario->loginEmployee($email,$senha);

            return $login;
        }

        public function getAllEmployeeData(){
            $consulta = $this->funcionario->getAllEmployeeData();

            return $consulta;
        }

        public function registerEmployee($nome,$senha,$email,$cargo,$usuario,$foto) {
            $register = $this->funcionario->registerEmployee($nome,$senha,$email,$cargo,$usuario,$foto);

            return $register;
        }

        public function getEmployeeDadaById($id){
            $consulta = $this->funcionario->getEmployeeDadaById($id);

            return $consulta;
        }

        public function updateEmployeeDatas($nome,$senha,$email,$cargo,$usuario,$foto,$id){
            $update = $this->funcionario->updateEmployeeDatas($nome,$senha,$email,$cargo,$usuario,$foto,$id);

            return $update;
        }

        public function deleteEmployeeDatas($id){
            $delete = $this->funcionario->deleteEmployeeDatas($id);

            return $delete;
        }
    }