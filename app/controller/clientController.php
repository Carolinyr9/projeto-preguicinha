<?php 
    require_once '../../config/database.php';
    require_once '../model/cliente.php';

    class ClienteController{
        private $cliente;

        private function connectClientClass(){
            $this->cliente = new Cliente;
        }

        public function getAllClientData(){
            $this->connectClientClass();
            $consulta = $this->cliente->getAllClientData();

            return $consulta;
        }

        public function registerClient($nome,$senha,$email,$endereco,$cep){
            $this->connectClientClass();
            $registro = $this->cliente->registerClient($nome,$senha,$email,$endereco,$cep);
        }


    }
?>