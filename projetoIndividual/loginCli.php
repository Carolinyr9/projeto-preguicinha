<?php
include_once 'cabecalho.php';
include_once 'conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica as credenciais
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM tabfuncionarios WHERE funUsuario = :usuario AND funSenha = :senha";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    // Se as credenciais estiverem corretas, redireciona para a página principal
    if ($stmt->rowCount() > 0) {
        header('Location: listafuncionarios.php');
        exit;
    } else {
        $mensagemErro = "Credenciais inválidas. Tente novamente.";
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
    <title>Login</title>
    <style>
        h3{
            color: white;
        }

        body {
            background-color: #fce4ec; /* Cor de fundo rosa claro */
        }

        .card {
            width: 30vw;
            margin: 50px auto;
            text-align: center;
            background-color: #FFA5AA; /* Cor do card rosa claro */
            padding: 20px;
            border-radius: 10px;
        }

        .card-content {
            padding-top: 20px;
        }

        .btn {
            background-color: #DF696E; /* Cor do botão rosa mais escuro */
        }

        .btn:hover {
            background-color: #D6656B; /* Cor do botão rosa mais escura ao passar o mouse */
        }

        .mensagem-erro {
            color: red;
        }

        .redirect {
            box-shadow: 1px 2px 6px #0000007d !important;
            margin: auto;
            display: inline-block;
            border: none;
            border-radius: 3px;
            line-height: 36px;
            padding: 2px;
            color: white;
            text-align: center;
            background-color: #DF696E;
            text-transform: uppercase;
        }
    </style>
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
