<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <title>Cadastro de Clientes</title>
   <link rel="stylesheet" href="../view/css/formCli.css">
</head>

<body>
<?php
include_once '../view/header.php';
?>
    <div class="container">
         <h3 class="light">Cadastro de clientes</h3>
         <form action="cadastrar_clientes.php" method="POST">
            <label>Nome: 
                <input type="text" name="txtnome">
            </label>

            <label>Email: 
                <input type="text" name="txtemail">
            </label>

            <label>Endereço: 
                <input type="text" name="txtendereco">
            </label>

            <label>CEP: 
                <input type="text" name="txtcep">
            </label>

            <label>Senha: 
                <input type="text" name="txtsenha">
            </label>

            <input type="submit" class="btn" name="btncadastrar" value="Cadastrar">
            <a href="listar_clientes.php" class="btn green">Listar clientes</a>
        </form>
    </div>
    <?php
        include_once '../view/footer.php';
    ?>
</body>

</html>