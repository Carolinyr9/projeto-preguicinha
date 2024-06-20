<?php
session_start();
require_once '../controller/clientController.php';
$registro = new ClienteController();

if(isset($_POST['btncadastrar'])){
    if(!empty($_POST['txtnome']) && !empty($_POST['txtemail']) && !empty($_POST['txtendereco']) && !empty($_POST['txtcep']) && !empty($_POST['txtsenha'])){
        $nome = $_POST['txtnome'];
        $email = $_POST[ 'txtemail'];
        $endereco = $_POST[ 'txtendereco'];
        $cep = $_POST[ 'txtcep'];
        $senha = $_POST[ 'txtsenha'];
        
        $registro->registerClient($nome,$senha,$email,$endereco,$cep);
        //Variável session atribuida com true caso queira checar nas outras páginas 
        //se o cliente se logou antes de acessar elas.
        $_SESSION['clientLogged'] = TRUE;
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
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <title>Cadastro de Clientes</title>
   <link rel="stylesheet" href="./css/formCli.css">
</head>

<body>
<?php
include_once './header.php';
?>
    <main class="container">
         <h3 class="light">Cadastro de clientes</h3>
         <form action="form_cad_clientes.php" method="POST">
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
    </main>
    <?php
        include_once './footer.php';
    ?>
</body>

</html>