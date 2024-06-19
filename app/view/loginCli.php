<?php
session_start();
require_once '../controller/clientController.php';
include_once '../view/header.php';

$login = new ClienteController();

if (isset($_POST['entrar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $result = $login->loginClient($email,$senha);
    if($result == TRUE){
        //Variável session atribuida com true caso queira checar nas outras páginas 
        //se o cliente se logou antes de acessar elas.
        $_SESSION['clientLogged'] = TRUE;
        header('Location: produtos.php');
        exit;
    }else{
        echo '<script>alert("Email ou senha incorretos!");</script>';
    }
}
?>
    
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../view/css/loginCli.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <h3>Login Clientes</h3>
            <?php
            if (isset($mensagemErro)) {
                echo "<p class='mensagem-erro'>$mensagemErro</p>";
            }
            ?>
            <form action="loginCli.php" method="post">
                <div class="input-field">
                    <input type="text" name="email" required>
                    <label for="email">Email</label>
                </div>
                <div class="input-field">
                    <input type="text" name="senha" required>
                    <label for="senha">Senha</label>
                </div>
                <input type="submit" value="Entrar" class="btn" name="entrar">
            </form>

            <a href="insereFuncionario.php" class="redirect">Registre-se!</a>
        </div>
    </div>

    <?php
        include_once '../view/footer.php';
    ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>
