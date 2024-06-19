<?php
session_start();
require_once '../controller/clientController.php';

$consulta = new ClienteController();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $dados = $consulta->getClientDadaById($id);
    $linha = $dados->fetch (PDO::FETCH_ASSOC);
}

if(isset($_POST['btnAlterar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $cep = $_POST['cep'];
    $senha = $_POST['senha'];

    $result = $consulta->updateClientDatas($id,$nome,$senha,$email,$endereco,$cep);

    if($result == TRUE){
        header('Location: listar_clientes.php');
        exit;
    }
}

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="./css/alterarCliente.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Alterar Cliente</title>
</head>
<body>
    <?php include_once './header.php'; ?>
    <div class="row">
        <div class="col s12 m6 push-m3">
            <h3 class="light">Alterando clientes</h3>
            <form action="alterar_cliente.php" method="post">
                
                <input type="hidden" name="id" value="<?php echo "{$linha['id']}"; ?>">
                    
                    <label class="input-field col s12">Nome: 
                        <input type="text" name="nome" value="<?php echo "{$linha['nome']}"; ?>" required>
                    </label>
                
                    <label class="input-field col s12">Email: 
                        <input type="text" name="email" value="<?php echo "{$linha['email']}"; ?>" required>
                    </label>
                
                    <label class="col s12">Endereço: 
                        <input type="text" name="endereco" value="<?php echo "{$linha['endereco']}"; ?>" required>
                    </label>
                
                    <label class="col s12">CEP: 
                        <input type="text" name="cep" value="<?php echo "{$linha['cep']}"; ?>" required>
                    </label>
                
                    <label class="col s12">Senha: 
                        <input type="text" name="senha" value="<?php echo "{$linha['senha']}"; ?>" required>
                    </label>

                <button type="submit" class="btn mt-4" name="btnAlterar">Alterar</button>
                <a href="listar_clientes.php" class="btn green mt-4">Listar clientes</a>
            </form>
        </div>
    </div>
   <?php include_once "footer.php";?>
</body>
</html>