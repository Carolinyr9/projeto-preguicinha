<?php
require_once '../config/database.php';
class Produto{
    private $id;
    private $descricao;
    private $imagem;
    private $preco;
    private $conn;

    public function __construct(){
        $database = new DataBase;
        $this->conn = $database->getConnection();
    }

    public function getAllProducts(){
        try{
            $consultaProdutos = $this->conn->prepare('SELECT * FROM produtos');
            $consultaProdutos->execute();
            return $consultaProdutos;
        } catch(PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getProductById($id){
        try{
            $consultaProduto = $this->conn->prepare('SELECT * FROM produtos WHERE id = ?');
            $consultaProduto->bindParam(1, $id);
            $consultaProduto->execute();
            return $consultaProduto;
        } catch(PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function registerProduct($descricao,$imagem,$preco) {
        try{
            $register = $this->conn->prepare("INSERT INTO produtos (descricao, imagem, preco) VALUES (?,?,?)");
            $register->bindValue(1, $descricao);
            $register->bindValue(2, $imagem);
            $register->bindValue(3, $preco);
            $register->execute();
            return TRUE;
        } catch(PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function updateProduct($id,$descricao,$imagem,$preco) {
        try{
            $update = $this->conn->prepare("UPDATE produtos SET descricao = ?, imagem = ?, preco = ? WHERE id = ?");
            $update->bindValue(1, $descricao);
            $update->bindValue(2, $imagem);
            $update->bindValue(3, $preco);
            $update->bindValue(4, $id);
            $update->execute();
            return TRUE;
        } catch(PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function deleteProduct($id) {
        try{
            $delete = $this->conn->prepare("DELETE FROM produtos WHERE id = ?");
            $delete->bindValue(1, $id);
            $delete->execute();
            return TRUE;
        } catch(PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}