<?php
// Conexão com o banco de dados
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produto_id = intval($_POST['produto_id']);
    $quantidade = intval($_POST['quantidade']);

    if($quantidade > 0){
        $stmt = $conn->prepare("UPDATE carrinho_compras SET quantidade = :quantidade WHERE produto_id = :produto_id");
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':produto_id', $produto_id);
    } else {
        $stmt = $conn->prepare("DELETE FROM carrinho_compras WHERE produto_id = :produto_id");
        $stmt->bindParam(':produto_id', $produto_id);
    }

    if ($stmt->execute()) {
        header('Location: carrinho.php');
        exit();
    } else {
        echo "Erro ao atualizar a quantidade";
    }
}
?>
