<?php
require_once '../model/produto.php';
class ProdutoController {
    private $produto;

    public function __construct(){
        $this->produto = new Produto();
    }

    public function getAllProducts(){
        $consulta = $this->produto->getAllProducts();

        return $consulta;
    }

    public function getProductById($id){
        $consulta = $this->produto->getProductById($id);

        return $consulta;
    }

    public function registerProduct($descricao,$imagem,$preco){
        $registro = $this->produto->registerProduct($descricao,$imagem,$preco);

        return $registro;
    }

    public function updateProduct($id,$descricao,$imagem,$preco){
        $update = $this->produto->updateProduct($id,$descricao,$imagem,$preco);

        return $update;
    }

    public function deleteProduct($id){
        $delete = $this->produto->deleteProduct($id);

        return $delete;
    }
}