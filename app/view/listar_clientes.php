<?php
session_start();
require_once '../controller/clientController.php';
include_once './header.php';

$consulta = new ClienteController();
$dados = $consulta->getAllClientData();

if(isset($_POST['btnDelete'])){
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $resultado = $consulta->deleteClientDatas($id);

        if($resultado == TRUE){
            echo '<script>alert("Cliente excluido com sucesso!"); window.location.href = "listar_clientes.php";</script>';
        }
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
                        <td><?php echo $linha['id']?></td>
                        <td><?php echo $linha['nome']?></td>
                        <td><?php echo $linha['email']?></td>
                        <td><?php echo $linha['endereco']?></td>
                        <td><?php echo $linha['cep']?></td>
                        <td><a href='alterar_cliente.php?id=<?php echo $linha['id']?>' class='btn-floating orange'><i class='material-icons'>edit</i></a></td>
                        <td>
                            <form action="listar_clientes.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $linha['id']?>"></input>
                                <button type="submit" class='btn-floating blue' name="btnDelete"><i class="material-icons">delete</i></button>
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