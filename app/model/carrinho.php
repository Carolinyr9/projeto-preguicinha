<?php 
require_once '../../config/database.php';

class Carrinho {
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

        if (!$stmt->execute()) {
            echo "Erro ao atualizar a quantidade";
        }
    }

    public function addItemCart($id) {
        $produto_id = $id;
        $quantidade = 1;

        $stmt = $this->conn->prepare("SELECT * FROM carrinho_compras WHERE produto_id = :produto_id");
        $stmt->bindParam(':produto_id', $produto_id);
        $stmt->execute();       

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $quantidade = $row['quantidade'];
            $stmt = $this->conn->prepare("UPDATE carrinho_compras SET quantidade = :quantidade WHERE produto_id = :produto_id");
        } else {
            $stmt = $this->conn->prepare("INSERT INTO carrinho_compras (produto_id, quantidade) VALUES (:produto_id, :quantidade)");
        }

        $stmt->bindParam(':produto_id', $produto_id);
        $stmt->bindParam(':quantidade', $quantidade);

        if (!$stmt->execute()) {
            echo "Erro ao adicionar produto ao carrinho";
        }
    }

    public function deleteProductCart($id) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM carrinho_compras WHERE produto_id = ?");
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return true;
            } else {
                echo "Erro ao executar a query: ";
                print_r($stmt->errorInfo());
                return false;
            }
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
}
?>
