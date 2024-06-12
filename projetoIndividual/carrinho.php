<?php
include_once "cabecalho.php";
include_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <!-- Compiled and minified CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <link rel="stylesheet" href="css/estilos.css">
   <!--Import Google Icon Font-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <title>Carrinho</title>
</head>

<body>
    <div class="container">
        <h2 class="center-align">Carrinho de compra</h2>

        <?php
        // Adiciona produto ao carrinho
        if (isset($_GET['codigo'])) {
            $proId = $_GET['codigo'];
            $quant = 1;

            // Verifica se o produto já está no carrinho
            $stmt = $conn->prepare("SELECT * FROM tabcarrinho WHERE carProId = :proId");
            $stmt->bindParam(':proId', $proId);
            $stmt->execute();
        ?>

        <?php
            if ($stmt->rowCount() > 0) {
                // Atualiza a quantidade se o produto já estiver no carrinho
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $quant += $row['carQtde'];
                $stmt = $conn->prepare("UPDATE tabcarrinho SET carQtde = :qt WHERE carProId = :prod");
            } else {
                // Adiciona o produto ao carrinho se não estiver lá
                $stmt = $conn->prepare("INSERT INTO tabcarrinho (carProId, carQtde ) VALUES (:prod, :qt)");
            }

            $stmt->bindParam(':prod', $proId);
            $stmt->bindParam(':qt', $quant);
            $stmt->execute();
        }
        ?>

        <!-- Listando os dados adicionados ao carrinho -->
        <ul class="collection">
            <?php
            $sql = "SELECT tabcarrinho.*, tabprodutos.proDescricao AS descricao FROM tabcarrinho INNER JOIN tabprodutos ON tabcarrinho.carProId = tabprodutos.proId";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <li class="collection-item">
                    <div>
                        <span><?= $linha['descricao'] ?></span>
                        <span class="secondary-content"><?= $linha['carQtde'] ?></span>
                    </div>
                </li>
            <?php } ?>
        </ul>

    </div>
    <br> <br>
    <?php include_once "footer.php"; ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>
