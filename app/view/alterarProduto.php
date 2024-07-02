<?php
session_start();
require_once '../controller/produtoController.php';
require_once '../controller/picture.php';

if((isset($_SESSION['funcLogged']) && $_SESSION['funcLogged'] != TRUE) || !isset($_SESSION['funcLogged'])){
    echo '<script>alert("Você não tem permissão para acessar essa página!"); window.location.href = "produtos.php";</script>';
}

$consulta = new ProdutoController();

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $dados = $consulta->getProductById($id);
    $linha = $dados->fetch (PDO::FETCH_ASSOC);
}

if(isset($_POST['btnAlterar'])){
    if(!empty($_POST['descricao']) && !empty($_POST['preco']) && !empty($_FILES["foto"])){
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $foto = $_FILES["foto"];
        $id = $_POST['id'];
        
        $pictureController = new Picture($foto);
        $nome_imagem = $pictureController->validatePicture();

        if($nome_imagem){
            $result = $consulta->updateProduct($id,$descricao,$nome_imagem,$preco);
            if($result == TRUE){
                header('Location:listarProdutos.php');
            }
        }
        else
        {
            $totalerros = $pictureController->countErrors();
            echo '<script>window.alert("' . $totalerros . '"); window.location="insereFuncionario.php";</script>';
        }
    }
     
}else{
    echo '<script>alert("Preencha todos os campos!");</script>';
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="./css/insereFunc.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Alterar Produto</title>
</head>
<body>
    <?php include_once './header.php'; ?>

    <h1>Alterar Dados - Produto</h1>
    <form action="alterarProduto.php" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="<?php echo "{$linha['id']}"; ?>">
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo "{$linha['descricao']}"; ?>" required>
        </div>
        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" class="form-control" id="preco" name="preco" value="<?php echo "{$linha['preco']}"; ?>" step="0.01" min="0.01" required>
        </div>
        <div class="mb-3">
            <span>A foto deve ter no máximo 1500px de largura e 1800px de altura</span>
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" value="<?php echo "{$linha['imagem']}"; ?>" required>
        </div>
        <input type="submit" value="Alterar" class="btn btn-primary" name="btnAlterar">
    </form>

    <?php include_once './footer.php'; ?>
</body>
</html>