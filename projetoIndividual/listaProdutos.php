<?php
include_once 'cabecalho.php';
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Produtos</title>
    <style>
        body {
            background-color: #fce4ec; /* Cor de fundo rosa claro */
        }

        h3 {
            color: #EE6E73; /* Cor do título rosa mais escuro */
        }

        hr {
            border-color: #DF696E; /* Cor da linha separadora rosa mais escuro */
        }

        .card {
            background-color: #FFA5AA; /* Cor do card rosa claro */
            color: black; /* Cor do texto rosa mais escuro */
        }

        .card-action a.btn {
            background-color: #DF696E; /* Cor do botão rosa mais escuro */
        }

        .card-action a.btn:hover {
            background-color: #D6656B; /* Cor do botão rosa mais escura ao passar o mouse */
        }

        .preco {
            font-size: 20px;
            color: #D6656B;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Produtos para venda</h3>
        <hr>

        <?php
        function mostrarDados($linha)
        {
            echo "<div class='col s12 m4'>";
            echo "<div class='card'>";
            echo "<div class='card-image'>";
            echo "<img src='imagens/{$linha['proImagem']}.webp'><br>";
            echo "</div>";
            echo "<div class='card-content'>";
            echo "<p>{$linha['proDescricao']}</p>";
            echo "</div>";
            echo "<div class='card-action'>";
            // Adicionando o código do produto como parâmetro no link
            echo "<p class='preco'>{$linha['proPreco']}</p>";
            echo "<a href='carrinho.php?codigo={$linha['proId']}' class='btn'>Comprar";
            echo "<i class='small material-icons'>local_grocery_store</i></a>";

            echo "</div>";
            echo "</div>";
            echo "</div>";
        }

        echo "<div class='row'>";
        $consulta = $conn->prepare('SELECT * FROM tabprodutos');
        $consulta->execute();

        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            mostrarDados($linha);
        }
        echo "</div>";
        ?>
    </div>

    <?php include_once "footer.php"; ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>
