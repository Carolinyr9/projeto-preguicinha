<?php
session_start();
require_once '../controller/funcionarioController.php';

$registro = new FuncionarioController();

if(isset($_POST['btnCadastrar'])){
    if(!empty($_POST['email']) && !empty($_POST['nome']) && !empty($_POST['cargo']) && !empty($_POST['usuario']) && !empty($_POST['foto']) && !empty($_POST['senha'])){
        $email = $_POST['email'];
        $nome = $_POST[ 'nome'];
        $cargo = $_POST[ 'cargo'];
        $usuario = $_POST[ 'usuario'];
        $foto = $_POST[ 'foto'];
        $senha = $_POST[ 'senha'];
        
        $registro->registerEmployee($nome,$senha,$email,$cargo,$usuario,$foto);
        //Variável session atribuida com true caso queira checar nas outras páginas 
        //se o funcionario se logou antes de acessar elas.
        $_SESSION['funcLogged'] = TRUE;
        header('Location:produtos.php');
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
    <link rel="stylesheet" href="./css/insereFunc.css">
    <title>Cadastro de Funcionários</title>
</head>

<body>
    <h1>Se registre - Funcionários</h1>
    <form action="insereFuncbd.php" method="post" autocomplete="off">
        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="text" class="form-control" id="id" name="id">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome">
        </div>
        <div class="mb-3">
            <label for="cargo" class="form-label">Cargo</label>
            <input type="text" class="form-control" id="cargo" name="cargo">
        </div>
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuário</label>
            <input type="text" class="form-control" id="usuario" name="usuario">
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="text" class="form-control" id="foto" name="foto">
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha">
        </div>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="loginFunc.php" class="redirect">Login</a>
    </form>



    <?php include_once "footer.php"; ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>