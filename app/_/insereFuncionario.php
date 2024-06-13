<?php
include_once 'cabecalho.php';
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Cadastro Funcionarios</title>
    <style>
        body {
            background-color: #fce4ec; /* Cor de fundo rosa claro */
        }

        h1 {
            font-size: 50px;
            text-align: center;
            margin: 20px 0;
            color: #EE6E73; /* Cor do título rosa mais escuro */
        }

        form {
            margin: 50px auto;
            width: 50%; /* Alterei a largura para 50% para se ajustar melhor */
            max-width: 500px;
            text-align: center;
            background-color: #FFA5AA; /* Cor do formulário rosa claro */
            padding: 20px;
            border-radius: 20px;
        }

        .redirect {
            box-shadow: 1px 2px 6px #0000007d !important;
            margin: 20px auto;
            display: block;
            border: none;
            border-radius: 3px;
            line-height: 36px;
            padding: 2px;
            color: white;
            width: 88px;
            text-align: center;
            background-color: #DF696E;
            text-transform: uppercase;
        }

        form label {
            color: #DF696E; /* Cor do texto rosa mais escuro */
        }

        form input {
            border: 1px solid #DF696E; /* Cor da borda rosa mais escuro */
            border-radius: 5px;
            margin-bottom: 10px;
        }

        form button {
            background-color: #DF696E; /* Cor do botão rosa mais escuro */
        }

        form button:hover {
            background-color: #D6656B; /* Cor do botão rosa mais escura ao passar o mouse */
        }
    </style>
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