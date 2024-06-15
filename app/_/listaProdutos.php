<?php
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="../view/css/produtos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        
    </style>
</head>

<body>
    <?php include_once '../view/header.php'; ?>

    <div class="container">
        <h3>Produtos para venda</h3>
        <hr>

        <div class="row">
            <?php
            function mostrarProduto($produto)
            {
                ?>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="../imagens/<?= htmlspecialchars($produto['imagem']) ?>.webp" alt="Imagem do produto"><br>
                        </div>
                        <div class="card-content">
                            <p><?= htmlspecialchars($produto['descricao']) ?></p>
                        </div>
                        <div class="card-action">
                            <p class="preco"><?= htmlspecialchars($produto['preco']) ?></p>
                            <a href="carrinho.php?codigo=<?= htmlspecialchars($produto['id']) ?>" class="btn">
                                Comprar
                                <i class="small material-icons">local_grocery_store</i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            }

            $consultaProdutos = $conn->prepare('SELECT * FROM produtos');
            $consultaProdutos->execute();

            while ($produto = $consultaProdutos->fetch(PDO::FETCH_ASSOC)) {
                mostrarProduto($produto);
            }
            ?>
        </div>
    </div>

    <?php include_once '../view/footer.php'; ?>
</body>

</html>
