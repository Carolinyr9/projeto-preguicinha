<?php

require_once 'conexao.php';

// Validar e escapar valores
$id = htmlspecialchars($_POST['id']);
$nome = htmlspecialchars($_POST['nome']);
$senha = htmlspecialchars($_POST['senha']);
$email = htmlspecialchars($_POST['email']);
$cargo = htmlspecialchars($_POST['cargo']);
$foto = htmlspecialchars($_POST['foto']);
$usuario = htmlspecialchars($_POST['usuario']);

// Preparar a instrução SQL
$insere = $conn->prepare("INSERT INTO tabfuncionarios(funId, funNome, funSenha, funEmail, funCargo, funUsuario, funFoto) VALUES (:i, :n, :s, :e, :c, :u, :f)");

// Vincular os valores com a devida especificação de tipo
$insere->bindValue(":i", $id, PDO::PARAM_INT);
$insere->bindValue(":n", $nome, PDO::PARAM_STR);
$insere->bindValue(":s", $senha, PDO::PARAM_STR);
$insere->bindValue(":e", $email, PDO::PARAM_STR);
$insere->bindValue(":c", $cargo, PDO::PARAM_STR);
$insere->bindValue(":u", $usuario, PDO::PARAM_STR);
$insere->bindValue(":f", $foto, PDO::PARAM_STR);

// Executar a instrução
$insere->execute();

// Verificar se a inserção foi bem-sucedida (opcional)
if ($insere->rowCount() > 0) {
    header("Location: listafuncionarios.php");
} else {
    echo "Erro ao inserir dados.";
}

?>