<?php
session_start();
require_once '../controller/funcionarioController.php';

$login = new FuncionarioController();

if (isset($_POST['entrar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $result = $login->loginEmployee($email,$senha);
    if($result == TRUE){
        //Variável session atribuida com true caso queira checar nas outras páginas 
        //se o funcionario se logou antes de acessar elas.
        $_SESSION['funcLogged'] = TRUE;
        header('Location: produtos.php');
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
    <?php
    include_once 'cabecalho.php';
    ?>
    <div class="container">
        <div class="card">
            <h3>Login Funcionários</h3>
            <?php
            if (isset($mensagemErro)) {
                echo "<p class='mensagem-erro'>$mensagemErro</p>";
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="input-field">
                    <input type="text" id="usuario" name="usuario" required>
                    <label for="usuario">Usuário</label>
                </div>
                <div class="input-field">
                    <input type="password" id="senha" name="senha" required>
                    <label for="senha">Senha</label>
                </div>
                <button type="submit" class="btn">Entrar</button>
            </form>

            <a href="insereFuncionario.php" class="redirect">Registre-se!</a>
        </div>
    </div>

    <?php include_once "footer.php"; ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>
