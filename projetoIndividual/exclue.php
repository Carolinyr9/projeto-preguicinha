<?php
include_once 'conexao.php';

try {
    $conn->exec('DELETE FROM tabprodutos');
    echo 'Todos os itens da tabela foram excluídos com sucesso.';
} catch (PDOException $e) {
    echo 'Erro ao excluir itens da tabela: ' . $e->getMessage();
}
?>
