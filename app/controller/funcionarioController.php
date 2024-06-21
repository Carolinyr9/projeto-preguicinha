<?php 
    require_once '../model/funcionario.php';

    class FuncionarioController{
        private $funcionario;

        private function __constructor(){
            $this->funcionario = new Funcionario;
        }
    }