<?php 
    require_once '../model/cliente.php';

    class ClienteController{
        private $cliente;

        public function __construct(){
            $this->cliente = new Cliente;
        }

        public function loginClient($email,$senha){
            $login = $this->cliente->loginClient($email,$senha);

            return $login;
        }

        public function getAllClientData(){
            $consulta = $this->cliente->getAllClientData();

            return $consulta;
        }

        public function registerClient($nome,$senha,$email,$endereco,$cep){
            $registro = $this->cliente->registerClient($nome,$senha,$email,$endereco,$cep);
        }

        public function getClientDadaById($id){
            $consulta = $this->cliente->getClientDadaById($id);

            return $consulta;
        }

        public function updateClientDatas($id,$nome,$senha,$email,$endereco,$cep){
            $update = $this->cliente->updateClientDatas($id,$nome,$senha,$email,$endereco,$cep);

            return $update;
        }

        public function deleteClientDatas($id){
            $delete = $this->cliente->deleteClientDatas($id);

            return $delete;
        }

    }
?>