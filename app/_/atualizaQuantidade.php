<?php
// Conexão com o banco de dados
require_once '../../config/database.php';
$database = new DataBase();
$conn = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produto_id = filter_input(INPUT_POST, 'produto_id', FILTER_VALIDATE_INT);
    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_VALIDATE_INT);

    if ($produto_id !== false && $quantidade !== false) {
        if ($quantidade > 0) {
            $stmt = $conn->prepare("UPDATE carrinho_compras SET quantidade = :quantidade WHERE produto_id = :produto_id");
            $stmt->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
            $stmt->bindParam(':produto_id', $produto_id, PDO::PARAM_INT);
        }

        if ($stmt->execute()) {
            header('Location: ../view/carrinho.php');
            exit();
        } else {
            echo "Erro ao atualizar a quantidade";
        }
    } else {
        echo "Dados inválidos";
    }
}
?>
