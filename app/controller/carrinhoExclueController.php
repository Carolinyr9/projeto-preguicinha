<?php
session_start();
require_once '../controller/carrinhoController.php';

$carrinhoController = new CarrinhoController();

if (isset($_GET['id'])) {
    $produto_id = intval($_GET['id']);
    if ($carrinhoController->deleteProductCart($produto_id)) {
        header('Location: ../view/carrinho.php');
        exit();
    } else {
        echo "Erro ao excluir o produto do carrinho.";
    }
} else {
    echo "Produto não especificado.";
}
?>
