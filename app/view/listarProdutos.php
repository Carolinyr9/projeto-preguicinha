<?php
session_start();
require_once '../controller/produtoController.php';
require_once 'produtoView.php';

if((isset($_SESSION['funcLogged']) && $_SESSION['funcLogged'] != TRUE) || !isset($_SESSION['funcLogged'])){
    echo '<script>alert("Você não tem permissão para acessar essa página!"); window.location.href = "produtos.php";</script>';
}

if(isset($_POST['btnDelete'])){
    if(isset($_POST['id'])){
        $id = $_POST['id'];

        $consulta = new ProdutoController();
        $resultado = $consulta->deleteProduct($id);

        if($resultado == TRUE){
            echo '<script>alert("Produto excluido com sucesso!"); window.location.href = "listarProdutos.php";</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./css/listarCli.css">
    <title>Lista de Produtos</title>
</head>
<body>
    <?php
        include_once '../view/header.php';
    ?>
   <main>
       <h2>Listagem de produtos</h2>
       <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Imagem</th>
                    <th>Preço</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    listarProdutos();
                ?>
            </tbody>
       </table>
       <a href='form_cad_produtos.php' class='btn'>Adicionar produto</a>
   </main>
   <?php include_once './footer.php'; ?>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>