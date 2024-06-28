<?php
session_start();
require_once '../controller/carrinhoController.php';
include_once '../view/header.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="../view/css/carrinho.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="js/alteraQuantidade.js"></script>
</head>
<body>
    <div class="container">
        <h2 class="center-align">Carrinho de Compras</h2>

        <?php
        $verificaCarrinho = new CarrinhoController();
        if (isset($_POST['codigo'])) {
            $verificaCarrinho->addItemCart($_POST['codigo']);
        }

        require_once '../config/database.php';
        $database = new DataBase();
        $conn = $database->getConnection();

        $sql = "SELECT carrinho_compras.*, produtos.descricao AS descricao 
                FROM carrinho_compras 
                INNER JOIN produtos ON carrinho_compras.produto_id = produtos.id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        ?>

        <ul class="collection">
            <?php while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
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

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>
