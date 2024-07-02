<?php
session_start();
require_once '../controller/produtoController.php';
require_once '../controller/picture.php';

$registro = new ProdutoController();

if(isset($_POST['btncadastrar'])){
    if(!empty($_POST['txtdescricao']) && !empty($_POST['txtpreco']) && !empty($_FILES['fileimagem'])){
        $descricao = $_POST['txtdescricao'];
        $preco = $_POST['txtpreco'];
        $foto = $_FILES['fileimagem'];

        $pictureController = new Picture($foto);
        $nome_imagem = $pictureController->validatePicture();

        if($nome_imagem){
            $registro->registerProduct($descricao,$nome_imagem,$preco);
            header('Location:listarProdutos.php');
        }
        else
        {
            $totalerros = $pictureController->countErrors();
            echo '<script>window.alert("' . $totalerros . '"); window.location="insereFuncionario.php";</script>';
        }
    }else{
        echo '<script>alert("Preencha todos os campos!");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="./css/formCli.css">
</head>
<body>
    <?php
    include_once './header.php';
    ?>
    <div class="container">
         <h3 class="light">Cadastro de Produtos</h3>
         <form action="form_cad_produtos.php" method="POST" enctype="multipart/form-data">
            <label>Descrição: 
                <input type="text" name="txtdescricao">
            </label>

            <label>Preço: 
                <input type="number" name="txtpreco" step="0.01" min="0.01">
            </label>

            <label>Imagem:
                <input type="file" class="form-control" id="fileimagem" name="fileimagem" required>
            </label>
            

            <button type="submit" name="btncadastrar" class="btn">Cadastrar</button>
         </form>
    </div>
    <?php include_once './footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>