<?php
include_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <title>Carrinho de Compras</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <link rel="stylesheet" href="css/estilos.css">
   <link rel="stylesheet" href="../view/css/carrinho.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <script>
        function alteraQuantidade(produtoId, quantidade, acao) {
            if (acao === 'aumentar') {
                quantidade++;
            } else if (acao === 'diminuir') {
                quantidade--;
            }
            document.getElementById('quantidade-' + produtoId).value = quantidade;
            document.getElementById('form-' + produtoId).submit();
        }
    </script>
</head>

<body>
    <?php include_once '../view/header.php'; ?>

    <div class="container">
        <h2 class="center-align">Carrinho de Compras</h2>

        <?php
        if (isset($_GET['codigo'])) {
            $produto_id = $_GET['codigo'];
            $quantidade = 1;

            $stmt = $conn->prepare("SELECT * FROM carrinho_compras WHERE produto_id = :produto_id");
            $stmt->bindParam(':produto_id', $produto_id);
            $stmt->execute();       
        
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $quantidade = $row['quantidade'];
                $stmt = $conn->prepare("UPDATE carrinho_compras SET quantidade = :quantidade WHERE produto_id = :produto_id");
            } else {
                $stmt = $conn->prepare("INSERT INTO carrinho_compras (produto_id, quantidade) VALUES (:produto_id, :quantidade)");
            }

            $stmt->bindParam(':produto_id', $produto_id);
            $stmt->bindParam(':quantidade', $quantidade);
            $stmt->execute();
        }
        ?>

        <ul class="collection">
            <?php
            $sql = "SELECT carrinho_compras.*, produtos.descricao AS descricao FROM carrinho_compras INNER JOIN produtos ON carrinho_compras.produto_id = produtos.id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <li class="collection-item">
                    <div>
                        <span><?= htmlspecialchars($linha['descricao']) ?></span>

                        <form id="form-<?= $linha['produto_id'] ?>" method="POST" action="atualizaQuantidade.php" style="display:inline;">
                            <input type="hidden" name="produto_id" value="<?= $linha['produto_id'] ?>">
                            <input type="hidden" id="quantidade-<?= $linha['produto_id'] ?>" name="quantidade" value="<?= $linha['quantidade'] ?>">
                            <span class="secondary-content" style="cursor: pointer;" onclick="alteraQuantidade(<?= $linha['produto_id'] ?>, <?= $linha['quantidade'] ?>, 'diminuir')"> - </span>
                            <span class="secondary-content" style="cursor: pointer;" onclick="alteraQuantidade(<?= $linha['produto_id'] ?>, <?= $linha['quantidade'] ?>, 'aumentar')"> + </span>
                        </form>
                        
                        <span class="secondary-content"><?= htmlspecialchars($linha['quantidade']) ?></span>
                    </div>
                </li>
            <?php } ?>
        </ul>
        <a href="listaprodutos.php" class="center-align" id="comprarMais">Comprar mais</a>
    </div>

    <?php include_once '../view/footer.php'; ?>
</body>

</html>
