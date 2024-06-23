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
    }