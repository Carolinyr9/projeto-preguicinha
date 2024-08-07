<?php
session_start();
require_once '../controller/funcionarioController.php';
require_once '../controller/picture.php';

if((isset($_SESSION['funcLogged']) && $_SESSION['funcLogged'] != TRUE) || !isset($_SESSION['funcLogged'])){
    echo '<script>alert("Você não tem permissão para acessar essa página!"); window.location.href = "produtos.php";</script>';
}

$consulta = new FuncionarioController();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $dados = $consulta->getEmployeeDadaById($id);
    $linha = $dados->fetch (PDO::FETCH_ASSOC);
}

if(isset($_POST['btnAlterar'])){
    if(!empty($_POST['email']) && !empty($_POST['nome']) && !empty($_POST['cargo']) && !empty($_POST['usuario']) && !empty($_FILES["foto"]) && !empty($_POST['senha'])){
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $cargo = $_POST['cargo'];
        $usuario = $_POST['usuario'];
        $foto = $_FILES["foto"]; 
        $senha = $_POST['senha'];
        $id = $_POST['id'];
        
        $pictureController = new Picture($foto);
        $nome_imagem = $pictureController->validatePicture();

        if($nome_imagem){
            $result = $consulta->updateEmployeeDatas($nome,$senha,$email,$cargo,$usuario,$nome_imagem,$id);
            if($result == TRUE){
                $_SESSION['funcLogged'] = TRUE;
                header('Location:produtos.php');
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
    <title>Alterar Cliente</title>
</head>
<body>
    <?php include_once './header.php'; ?>

    <h1>Alterar Dados - Funcionário</h1>
    <form action="alterarFunc.php" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="<?php echo "{$linha['id']}"; ?>">
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo "{$linha['email']}"; ?>" required>
        </div>
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo "{$linha['nome']}"; ?>" required>
        </div>
        <div class="mb-3">
            <label for="cargo" class="form-label">Cargo</label>
            <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo "{$linha['cargo']}"; ?>" required>
        </div>
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuário</label>
            <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo "{$linha['usuario']}"; ?>" required>
        </div>
        <div class="mb-3">
            <span>A foto deve ter no máximo 1500px de largura e 1800px de altura</span>
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" value="<?php echo "{$linha['foto']}"; ?>" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" value="<?php echo "{$linha['senha']}"; ?>" required>
        </div>
        
        <input type="submit" value="Alterar" class="btn btn-primary" name="btnAlterar">
    </form>

    <?php include_once './footer.php'; ?>
</body>
</html>