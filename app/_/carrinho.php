<?php
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
   <title>Carrinho de Compras</title>
</head>

<body>
    <div class="container">
        <h2 class="center-align">Carrinho de Compras</h2>

        <?php
        // Adiciona produto ao carrinho_compras
        if (isset($_GET['codigo'])) {
            $produto_id = $_GET['codigo'];
            $quant = 1;

            // Verifica se o produto já está no carrinho_compras
            $stmt = $conn->prepare("SELECT * FROM carrinho_compras WHERE produto_id = :produto_id");
            $stmt->bindParam(':produto_id', $produto_id);
            $stmt->execute();       
        
            if ($stmt->rowCount() > 0) {
                // Atualiza a quantidade se o produto já estiver no carrinho_compras
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $quant = $row['quantidade'];
                $stmt = $conn->prepare("UPDATE carrinho_compras SET quantidade = :quantidade WHERE produto_id = :produto_id");
            } else {
                // Adiciona o produto ao carrinho_compras se não estiver lá
                $stmt = $conn->prepare("INSERT INTO carrinho_compras (produto_id, quantidade ) VALUES (:produto_id, :quantidade)");
            }

            $stmt->bindParam(':produto_id', $produto_id);
            $stmt->bindParam(':quantidade', $quant);
            $stmt->execute();
        }
        ?>

        <!-- Listando os dados adicionados ao carrinho_compras -->
        <ul class="collection">
            <?php
            $sql = "SELECT carrinho_compras.*, produtos.descricao AS descricao FROM carrinho_compras INNER JOIN produtos ON carrinho_compras.produto_id = produtos.id";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <li class="collection-item">
                    <div>
                        <span><?= $linha['descricao'] ?></span>
                        <span class="secondary-content"><?= $linha['quantidade'] ?></span>
                    </div>
                </li>
            <?php } ?>
        </ul>

    </div>
    <br> <br>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>
