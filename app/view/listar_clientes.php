<?php
session_start();
require_once '../controller/clientController.php';
include_once './header.php';

$consulta = new ClienteController();
$dados = $consulta->getAllClientData();

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
                    <th>Telefone</th>
                    <th>Data Nasc.</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($linha = $dados->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr><td>{$linha['cliId']}</td>";
                        echo "<td>{$linha['cliNome']}</td>";
                        echo "<td>{$linha['cliTelefone']}</td>";
                        echo "<td>{$linha['cliDataNasc']}</td>";
                        echo "<td><a href='alterar_cliente.php?id={$linha['cliId']}' class='btn-floating orange'><i class='material-icons'>edit</i></a></td>";
                        echo "<td><a href='excluir_cliente_action.php?id={$linha['cliId']}' class='btn-floating blue'><i class='material-icons'>delete</i></a></td></tr>";
                    }
                ?>
            </tbody>
        </table>
        <a href='form_cad_clientes.php' class='btn'>Adicionar cliente</a>
            
   </main>

        

    <?php include_once './footer.php'; ?>

</body>
</html>