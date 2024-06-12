<?php
require_once('conexao.php');

// Array de produtos a serem inseridos
$produtos = array(
    array('Pelúcia Ursinho', 'ursinho', 25.99),
    array('Pelúcia Coelhinho', 'coelho', 19.99),
    array('Pelúcia Carneirinho', 'carneiro', 29.99),
    array('Pelúcia Leãozinho', 'leao', 22.50),
    array('Pelúcia Elefantinho', 'elefante', 27.99),
    array('Pelúcia Girafinha', 'girafa', 32.99)
);

// Inserir produtos na tabela
foreach ($produtos as $produto) {
    $descricao = $produto[0];
    $imagem = $produto[1];
    $preco = $produto[2];

    $sql = "INSERT INTO tabprodutos (proDescricao, proImagem, proPreco) VALUES ('$descricao', '$imagem', $preco)";

    if ($conn->query($sql) !== TRUE) {
        echo "Erro ao inserir produto: " . $conn->error;
    }
}

// Fechar conexão
$conn->close();

echo "Produtos inseridos com sucesso!";
?>
