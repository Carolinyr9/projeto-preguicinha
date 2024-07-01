<?php
session_start();
require_once '../controller/carrinhoController.php';

$carrinhoController = new CarrinhoController();

if (isset($_GET['produto_id'])) {
    $produto_id = intval($_GET['produto_id']);
    if ($carrinhoController->deleteProductCart($produto_id)) {
        // Redireciona após a exclusão bem-sucedida
        header('Location: ../view/carrinho.php');
        exit(); // Encerra o script após o redirecionamento
    } else {
        echo "Erro ao excluir o produto do carrinho.";
    }
} else {
    echo "Produto não especificado.";
}
?>
