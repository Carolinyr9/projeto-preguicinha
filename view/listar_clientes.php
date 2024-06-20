<?php
session_start();
require_once '../controller/clientController.php';
include_once './header.php';

$consulta = new ClienteController();
$dados = $consulta->getAllClientData();

if(isset($_POST['btnExcluir'])){
    $id = isset($_POST['id'])?isset($_POST['id']):'' ;
    $result = $consulta->deleteClientDatas($id);
    
    if($result == TRUE){
        echo '<script>alert("Dados excluidos");</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./css/listarCli.css">
    <title>Lista de Clientes</title>
</head>
<body>
   <main>
       <h2>Listagem de clientes</h2>
       <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Endereço</th>
                    <th>CEP</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($linha = $dados->fetch(PDO::FETCH_ASSOC)) {
                ?>
                        <tr>
                            <td><? echo $linha['id'] ?></td>
                            <td>{$linha['nome']}</td>
                            <td>{$linha['email']}</td>
                            <td>{$linha['endereco']}</td>
                            <td>{$linha['cep']}</td>
                            <td><a href='alterar_cliente.php?id={$linha['id']}' class='btn-floating orange'><i class='material-icons'>edit</i></a></td>
                            <td>
                                <form action='listar_clientes.php' method='POST'>
                                    <input type='hidden' name={$linha['id']}>
                                    <button type='submit' name='btnExcluir' class='btn-floating orange'><i class='material-icons'>delete</i></button>
                                </form>
                            </td>
                        </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <a href='form_cad_clientes.php' class='btn'>Adicionar cliente</a>
            
   </main>

        

    <?php include_once './footer.php'; ?>

</body>
</html>