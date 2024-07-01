<?php
session_start();
require_once '../controller/carrinhoController.php';
include_once '../view/header.php';
$carrinhoController = new CarrinhoController();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="css/carrinhoEstilo.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script>
        function alteraQuantidade(produto_id, quantidade, operacao) {
            var novaQuantidade = quantidade;

            if (operacao === 'diminuir' && novaQuantidade > 1) {
                novaQuantidade--;
            } else if (operacao === 'aumentar') {
                novaQuantidade++;
            }

            document.getElementById('quantidade-' + produto_id).value = novaQuantidade;
            document.getElementById('form-' + produto_id).submit();
        }
    </script>
</head>
<body>
    <div class="container">
        <h2 class="center-align">Carrinho de Compras</h2>

        <?php

        if (isset($_GET['codigo'])) {
            $carrinhoController->addItemCart($_GET['codigo']);
        }

        require_once '../../config/database.php';
        $database = new DataBase();
        $conn = $database->getConnection();

        $sql = "SELECT carrinho_compras.*, produtos.descricao AS descricao 
                FROM carrinho_compras 
                INNER JOIN produtos ON carrinho_compras.produto_id = produtos.id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        ?>

        <ul class="collection">
            <?php 
            if ($stmt->rowCount() > 0) {
                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <li class="collection-item">
                        <div>
                            <span><?= htmlspecialchars($linha['descricao']) ?></span>

                            <form id="form-<?= $linha['produto_id'] ?>" method="POST" action="../controller/carrinhoQuantidadeController.php" style="display:inline;">
                                <input type="hidden" name="action" value="changeQuantity">
                                <input type="hidden" name="produto_id" value="<?= $linha['produto_id'] ?>">
                                <span class="secondary-content" style="cursor: pointer;" onclick="alteraQuantidade(<?= $linha['produto_id'] ?>, <?= $linha['quantidade'] ?>, 'diminuir')"> - </span>
                                <input type="hidden" id="quantidade-<?= $linha['produto_id'] ?>" name="quantidade" value="<?= $linha['quantidade'] ?>">
                                <span class="secondary-content" style="cursor: pointer;" onclick="alteraQuantidade(<?= $linha['produto_id'] ?>, <?= $linha['quantidade'] ?>, 'aumentar')"> + </span>
                                
                            </form>
                            <a href="../controller/carrinhoExclueController.php?id=<?= $linha['produto_id'] ?>" class="secondary-content"><i class="material-icons">delete</i></a>
                            
                            <span class="secondary-content" id="quantidade-exibida-<?= $linha['produto_id'] ?>"><?= htmlspecialchars($linha['quantidade']) ?></span>
                        </div>
                    </li>
                <?php } 
            } else {
                echo "<p class='center-align'>Seu carrinho está vazio.</p>";
            } ?>
        </ul>
        <div class="row center-align">
            <a href="produtos.php" class="btn" id="comprarMais">Comprar mais</a>
        </div>
    </div>

    <?php include_once '../view/footer.php'; ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>
