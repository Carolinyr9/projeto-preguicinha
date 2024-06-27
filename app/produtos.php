<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="../view/css/produtos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <?php
    include_once 'view/header.php';
    ?>

    <div class="container">
        <h3>Produtos para venda</h3>
        <hr>

        <div class="row">
            <?php
            require_once 'view/produto.php';
            mostrarProdutos();
            ?>
        </div>
    </div>

    <?php 
    include_once "view/footer.php"; 
    ?>
</body>

</html>
