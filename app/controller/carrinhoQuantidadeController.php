<?php
session_start();
require_once '../controller/carrinhoController.php';

$carrinhoController = new CarrinhoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produto_id = filter_input(INPUT_POST, 'produto_id', FILTER_VALIDATE_INT);

    if ($produto_id !== false && $produto_id !== null) {
        $carrinhoController->changeQuantity($produto_id);
        header('Location: ../view/carrinho.php');
        exit();
    } else {
        echo "ID do produto inválido.";
    }
}
?>
