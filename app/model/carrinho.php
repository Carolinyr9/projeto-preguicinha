<?php 
require_once '../../config/database.php';

class Carrinho{
    private $id;
    private $produto;
    private $quantidade;
    private $conn;

    public function __construct() {
        $this->getConnectionDataBase();
    }

    private function getConnectionDataBase() {
        $database = new DataBase();
        $this->conn = $database->getConnection();
    }

    public function changeQuantity($id) {
        $produto_id = intval($_POST['produto_id']);
        $quantidade = intval($_POST['quantidade']);
    
        if ($quantidade > 0) {
            $stmt = $this->conn->prepare("UPDATE carrinho_compras SET quantidade = :quantidade WHERE produto_id = :produto_id");
            $stmt->bindParam(':quantidade', $quantidade);
            $stmt->bindParam(':produto_id', $produto_id);
        } else {
            $stmt = $this->conn->prepare("DELETE FROM carrinho_compras WHERE produto_id = :produto_id");
            $stmt->bindParam(':produto_id', $produto_id);
        }
    
        if ($stmt->execute()) {
            header('Location: carrinho.php');
            exit();
        } else {
            echo "Erro ao atualizar a quantidade";
        }
    }

    public function addItemCart() {
        $produto_id = intval($_GET['codigo']);
        $quantidade = 1;

        $stmt = $this->conn->prepare("SELECT * FROM carrinho_compras WHERE produto_id = :produto_id");
        $stmt->bindParam(':produto_id', $produto_id);
        $stmt->execute();       

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $quantidade = $row['quantidade'] + 1;
            $stmt = $this->conn->prepare("UPDATE carrinho_compras SET quantidade = :quantidade WHERE produto_id = :produto_id");
        } else {
            $stmt = $this->conn->prepare("INSERT INTO carrinho_compras (produto_id, quantidade) VALUES (:produto_id, :quantidade)");
        }

        $stmt->bindParam(':produto_id', $produto_id);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->execute();
    }

    public function deleteProductCart($id) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM carrinho_compras WHERE id = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
?>
