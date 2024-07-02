<?php
session_start();
require_once '../controller/funcionarioController.php';
require_once '../controller/picture.php';

$registro = new FuncionarioController();

if(isset($_POST['btnCadastrar'])){
    if(!empty($_POST['email']) && !empty($_POST['nome']) && !empty($_POST['cargo']) && !empty($_POST['usuario']) && !empty($_FILES["foto"]) && !empty($_POST['senha'])){
        $email = $_POST['email'];
        $nome = $_POST[ 'nome'];
        $cargo = $_POST[ 'cargo'];
        $usuario = $_POST[ 'usuario'];
        $foto = $_FILES["foto"]; 
        $senha = $_POST[ 'senha'];
        
        $pictureController = new Picture($foto);
        $nome_imagem = $pictureController->validatePicture();

        if($nome_imagem){
            $registro->registerEmployee($nome,$senha,$email,$cargo,$usuario,$nome_imagem);
            $_SESSION['funcLogged'] = TRUE;
            header('Location:produtos.php');
        }
        else
        {
            $totalerros = $pictureController->countErrors();
            echo '<script>window.alert("' . $totalerros . '"); window.location="insereFuncionario.php";</script>';
        };
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
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./css/formFunc.css">
    <title>Cadastro de Funcionários</title>
</head>
<body>
    <?php include_once '../view/header.php'; ?>
    <h1>Se registre - Funcionários</h1>
    <form action="insereFuncionario.php" method="post" enctype="multipart/form-data" >
        <div class="mb-3">
            <label for="email" class="form-label">E-mail
                <input type="email" class="form-control" id="email" name="email" required>
            </label>
        </div>
        <div class="mb-3">
            <label for="nome" class="form-label">Nome
                <input type="text" class="form-control" id="nome" name="nome" required>
            </label>
        </div>
        <div class="mb-3">
            <label for="cargo" class="form-label">Cargo
                <input type="text" class="form-control" id="cargo" name="cargo" required>
            </label>
        </div>
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuário
                <input type="text" class="form-control" id="usuario" name="usuario" required>
            </label>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto
                <input type="file" class="form-control" id="foto" name="foto" required>
            </label>
            <span>A foto deve ter no máximo 1500px de largura e 1800px de altura</span>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha
                <input type="password" class="form-control" id="senha" name="senha" required>
            </label>
        </div>
        
        <input type="submit" value="Cadastrar" class="btn btn-primary" name="btnCadastrar">
        <a href="loginFunc.php" class="redirect">Login</a>
    </form>

    <?php include_once './footer.php'; ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>