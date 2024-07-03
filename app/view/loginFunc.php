<?php
session_start();
require_once '../controller/funcionarioController.php';

$login = new FuncionarioController();

if (isset($_POST['entrar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $result = $login->loginEmployee($email,$senha);
    if($result == TRUE){
        $_SESSION['funcLogged'] = TRUE;
        header('Location: listarFunc.php');
        exit;
    }else{
        echo '<script>alert("Email ou senha incorretos!");</script>';
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
    <link rel="stylesheet" href="./css/loginFunc.css">
    <title>Login</title>
    
</head>

<body>
    <?php include_once '../view/header.php'; ?>

    <div class="container">
        <div class="card">
            <h3>Login Funcionários</h3>
            <form action="loginFunc.php" method="POST">
                <label for="email">Email
                <input type="text" name="email" required>
                </label>
                <label for="senha">Senha
                    <input type="text" name="senha" required>
                </label>
                <input type="submit" value="Entrar" class="btn" name="entrar">
            </form>

            <a href="insereFuncionario.php" class="redirect">Registre-se!</a>
        </div>
    </div>

    <?php include_once '../view/footer.php'; ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>
